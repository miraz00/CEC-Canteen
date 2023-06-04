<?php
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