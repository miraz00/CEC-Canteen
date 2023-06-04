<?php
session_start();

date_default_timezone_set("Asia/Kolkata");

require_once('includes/helpers.php');

switch(@$_REQUEST['action'])
{
    case 'login_page':
        render("templates/header", ["title" => "Login"]);
        render("login");
        render("templates/footer");
        break;

    case 'register_page':
        render("templates/header", ["title" => "Register"]);
        render("register");
        render("templates/footer");
        break;

    default:
        redirect_home();
}