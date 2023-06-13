<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function render($template, $data = array()): void
{
    $path = 'view/' . $template . '.php';
    if (file_exists($path))
    {
        extract($data);
        require($path);
    }
}

function redirect_home(): void
{
    render("templates/header", ["title" => "Home"]);
    render("home");
    render("templates/footer");
}

function redirect_register($message = null): void
{
    render("templates/header", ["title" => "Register"]);
    if ($message)
        render("register", ["message" => $message]);
    else
        render("register");
    render("templates/footer");
}

function redirect_login($message = null)
{
    render("templates/header", ["title" => "Login"]);
    if ($message)
        render("login", ["message" => $message]);
    else
        render("login");
    render("templates/footer");
}

function send_message($email, $name)
{
    $mail = new PHPMailer(true);

    try {
        //Enable verbose debug output
        $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;

        //Send using SMTP
        $mail->isSMTP();

        //Set the SMTP server to send through
        $mail->Host = 'smtp.gmail.com';

        //Enable SMTP authentication
        $mail->SMTPAuth = true;

        //SMTP username
        $mail->Username = 'ceccanteen@gmail.com';

        //SMTP password
        $mail->Password = 'kwjxtptlijzppbzd';

        //Enable TLS encryption;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('ceccanteen@gmail.com', 'CEC Canteen');

        //Add a recipient
        $mail->addAddress($email, $name);

        //Set email format to HTML
        $mail->isHTML(true);

        $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

        $mail->Subject = 'Email verification';
        $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

        $mail->send();

        return $verification_code;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}

function redirect_order_history(): void
{
    render("templates/header", ["title" => "Order History"]);
    render("history");
    render("templates/footer");
}

function utf_nbsp_to_sp(&$cart): void
{
    foreach ($cart as &$item)
        $item['name'] = str_replace("\xC2\xA0", ' ', $item['name']);
    unset($item);
}