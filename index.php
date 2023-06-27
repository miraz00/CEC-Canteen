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
                    redirect_register("Username already exists!");
                    return;
                }
                if (check_email($_POST['email']))
                {
                    redirect_register("Email already exists!");
                    return;
                }
                if ($_POST['account'] == 'student')
                {
                    if (!str_contains(strtolower($_POST['email']), 'chn') || !str_contains(strtolower($_POST['email']), '@ceconline.edu'))
                    {
                        redirect_register("Enter a valid student email address!");
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
                $_SESSION['account'] = 'admin';
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

    case 'order_status':
        if(isset($_POST['preparing']))
        {
            if($_POST['preparing'] == 0)
                update_order_status("preparing", 1, $_POST['order_id']);
            else
            {
                update_order_status("preparing", 0, $_POST['order_id']);
                update_order_status("prepared", 0, $_POST['order_id']);
                update_order_status("delivered", 0, $_POST['order_id']);
            }
        }
        if(isset($_POST['prepared']))
        {
            if($_POST['prepared'] == 0)
            {
                update_order_status("prepared", 1, $_POST['order_id']);
                update_order_status("preparing", 1, $_POST['order_id']);
            }
            else
            {
                update_order_status("prepared", 0, $_POST['order_id']);
                update_order_status("delivered", 0, $_POST['order_id']);
            }
        }
        if(isset($_POST['delivered']))
        {
            if($_POST['delivered'] == 0)
            {
                update_order_status("delivered", 1, $_POST['order_id']);
                update_order_status("prepared", 1, $_POST['order_id']);
                update_order_status("preparing", 1, $_POST['order_id']);
            }
            else
                update_order_status("delivered", 0, $_POST['order_id']);
        }
        header("Location: view/admin/main/template/orders.php");
        break;
    

        case 'save_edited_data':
            if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['username']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['tokens'])) {
                // Get the submitted form data
                
                
                $username = $_POST['username'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $tokens = $_POST['tokens'];
        
                // Update the user data in the database
                $success = update_user_data($username, $name, $email, $tokens);
        
                if ($success) {
                    // Data updated successfully, send a success response
                    echo "Data updated successfully.";
                } else {
                    // Failed to update data, send an error response
                    echo "Failed to update data.";
                }
            } else {
                // Invalid request, send an error response
                echo "Invalid request.";
            
            }
            break;
        


            case 'delete_user':
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username'])) {
                    $username = $_POST['username'];
            
                    // Delete the user record from the database
                    $success = delete_user_data($username);
            
                    if ($success) {
                        // User deleted successfully, send a success response
                        echo "User deleted successfully.";
                        exit();
                    } else {
                        // Failed to delete user, send an error response
                        header("HTTP/1.1 500 Internal Server Error");
                        echo "Failed to delete user.";
                        exit();
                    }
                }
                break;
            



                case 'save_item_data':
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['category_id']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['quantity']) ) {
                        
                        // Get the submitted form data
                        $category_id = $_POST['category_id'];
                        $name = $_POST['name'];
                        $price = $_POST['price'];
                        $quantity = $_POST['quantity'];
                
                        // Update the user data in the database
                        $success = update_item_data($category_id, $name, $price, $quantity);
                
                        if ($success) {
                            // Data updated successfully, send a success response
                            echo "Data updated successfully.";
                        } else {
                            // Failed to update data, send an error response
                            echo "Failed to update data.";
                        }
                    } else {
                        // Invalid request, send an error response
                        echo "Invalid request.";
                    
                    }
                    break;
                
        
        
                
             case 'delete_item':
                     if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
                            $name = $_POST['name'];
                    
                            // Delete the user record from the database
                            $success = delete_item_data($name);
                    
                            if ($success) {
                                // User deleted successfully, send a success response
                                echo "User deleted successfully.";
                                exit();
                            } else {
                                // Failed to delete user, send an error response
                                header("HTTP/1.1 500 Internal Server Error");
                                echo "Failed to delete user.";
                                exit();
                            }
                        }
                        break;


                        
                            

                            case 'add_item':
                                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['category_name'])  && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['quantity']) ) {
                                    // Get the submitted form data
                                    $category_name = $_POST['category_name'];
                                    $name = $_POST['name'];
                                    $price = $_POST['price'];
                                    $quantity = $_POST['quantity'];
                            
                                    // Insert the new user data into the database
                                    $item_insert_statement = add_item_data($category_name, $name, $price, $quantity);
                            
                                    if ($item_insert_statement) {
                                        // User added successfully, send a success response
                                        echo "Item added successfully.";
                                    } else {
                                        // Failed to add user, send an error response
                                        echo "Failed to add item";
                                    }
                                } else {
                                    // Invalid request, send an error response
                                    echo "Invalid request.";
                                }
                                break;        
            
        
    default:
        redirect_home();
}