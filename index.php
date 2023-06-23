<?php
session_start();

date_default_timezone_set("Asia/Kolkata");

header('Content-Type: text/html; charset=utf-8');

require_once('model/canteen_db.php');
require_once('model/users.php');
require_once('model/items.php');
require_once('model/orders.php');
require_once('model/bills.php');

require_once('includes/helpers.php');

$temp = 0;
if(isset($_REQUEST['action']))
    if(str_contains($_REQUEST['action'], 'cat'))
    {
        $temp = $_REQUEST['action'];
        $_REQUEST['action'] = 'order_page';
    }


if (isset($_SESSION['tokens']))
    $_SESSION['tokens'] = get_tokens($_SESSION['user_id']);


switch(@$_REQUEST['action'])
{
    case 'login_page':
        render("templates/header", ["title" => "Login"]);
        render("login");
        render("templates/footer");
        break;

    case 'register_page':
        redirect_register();
        break;

    case 'register':
        if (empty($_POST['email']) || empty($_POST['name']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['confirm_password']))
        {
            redirect_register("Fields cannot be empty!");
            return;
        }
        else
            if ($_POST['password'] !== $_POST['confirm_password'])
                redirect_register("Passwords doesn't match!");
            else
                if (check_username($_POST['username']))
                {
                    redirect_register("username already exists!");
                    return;
                }
                if (check_email($_POST['email']))
                {
                    redirect_register("email already exists!");
                    return;
                }
                if ($_POST['account'] == 'student')
                {
                    if (!str_contains(strtolower($_POST['email']), 'chn') || !str_contains(strtolower($_POST['email']), '@ceconline.edu'))
                    {
                        redirect_register("enter a valid student email address!");
                        return;
                    }
                }
                else
                {
                    if (!str_contains(strtolower($_POST['email']), '@ceconline.edu'))
                    {
                        redirect_register("enter a valid teacher email address!");
                        return;
                    }
                }
                $verification_code = send_message($_POST['email'], $_POST['name']);
                $_SESSION['verification_code'] = $verification_code;
                $_SESSION['name'] = $_POST['name'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['password'] = $_POST['password'];
                $_SESSION['account'] = $_POST['account'];
                header("Location: view/verification.php");
        break;

    case 'code_submit':

        if ($_POST['code'] == $_SESSION['verification_code'])
        {
            if ($_SESSION['account'] == 'student')
            {
                if (add_student($_SESSION['name'], $_SESSION['email'], $_SESSION['username'], password_hash($_SESSION['password'], PASSWORD_DEFAULT)))
                {
                    session_unset();
                    redirect_login("Registered Successfully!");
                    return;
                }
            }
            if ($_SESSION['account'] == 'teacher')
            {
                if (add_teacher($_SESSION['name'], $_SESSION['email'], $_SESSION['username'], $_SESSION['password']))
                {
                    session_unset();
                    redirect_login("Registered Successfully!");
                    return;
                }
            }
        }
        else
        {
            redirect_register("Incorrect Verification code!");
            return;
        }
        break;

    case "login":
        if (isset($_POST['username']) && isset($_POST['password']))
            if ($_POST['username'] == 'admin' && $_POST['password'] == 'admin')
            {
                header("Location: view/admin/main/template/admin.php");
                return;
            }
            if (!empty($_POST['username']) && !empty($_POST['password']))
                if (check($_POST['username'], $_POST['password']))
                {
                    $user = user_details($_POST['username']);
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['name'] = $user['name'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['username'] = $user['username'];
                    if(isset($user['tokens']))
                    {
                        $_SESSION['account'] = 'student';
                        $_SESSION['tokens'] = $user['tokens'];
                    }
                    else
                        $_SESSION['account'] = 'teacher';
                    redirect_home();
                    return;
                }
                else
                {
                    $_REQUEST['action'] = "login_page";
                    redirect_login("Incorrect Username and/or Password!");
                }
            else
            {
                $_REQUEST['action'] = "login_page";
                redirect_login("Username and/or Password can't be empty!");
            }
        break;

    case "logout":
        session_unset();
        redirect_home();
        break;

    case "order_page":
        if (!isset($_SESSION['user_id']))
        {
            $_REQUEST['action'] = 'login_page';
            redirect_login("You need to login first!");
            return;
        }
        $_REQUEST['action'] = $temp;
        $breakfast_items = select_items('breakfast');
        $rice_dishes_items = select_items('rice dishes');
        $curries_items = select_items('curries');
        $snacks_items = select_items('snacks');
        $beverages_items = select_items('beverages');
        $desserts_items = select_items('desserts');
        render("templates/header", ["title" => "Order Your Food"]);
        render("order");
        render("templates/footer");
        break;

    case "place_order":
        if($_SESSION['account'] == 'student' && $_POST['total'] > $_SESSION['tokens'])
        {
                $_REQUEST['action'] = 'cat_' . $_REQUEST['category'];
                $breakfast_items = select_items('breakfast');
                $rice_dishes_items = select_items('rice dishes');
                $curries_items = select_items('curries');
                $snacks_items = select_items('snacks');
                $beverages_items = select_items('beverages');
                $desserts_items = select_items('desserts');
                render("templates/header", ["title" => "Order Your Food"]);
                render("order", ["error_message" => "Token balance insufficient, please recharge your tokens by contacting the canteen administrator."]);
                render("templates/footer");
                return;
        }

        $_SESSION['script'] = "<script>sessionStorage.removeItem('shoppingCart');</script>";
        $jsonString = $_POST['cart'];
        $cart = json_decode($jsonString, true);
        utf_nbsp_to_sp($cart);
        $_SESSION['total'] = $_POST['total'];
        update_orders($cart);
        if($_SESSION['account'] == 'student')
        {
            $_SESSION['tokens'] -= $_POST['total'];
            update_tokens();
        }
        header("Location: view/history.php");

        break;

    case 'bills':
        render("templates/header", ["title" => "Bills"]);
        render("bills");
        render("templates/footer");
        break;

    default:
        redirect_home();
}