<?php
session_start();

date_default_timezone_set("Asia/Kolkata");

require_once('model/canteen_db.php');
require_once('model/users.php');

require_once('includes/helpers.php');

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
            if (!empty($_POST['username']) && !empty($_POST['password']))
                if (check($_POST['username'], $_POST['password']))
                {
                    redirect_home();
                    return;
                }
                else
                    redirect_login("Incorrect Username and/or Password!");
            else
                redirect_login("Username and/or Password can't be empty!");
        break;

    case "logout":
        session_unset();
        redirect_home();
        break;

    default:
        redirect_home();
}