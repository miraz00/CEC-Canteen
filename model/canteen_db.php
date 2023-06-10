<?php
$db_name = "mysql:host=localhost;dbname=canteen";
$username = "root";

try {
    $db = new PDO($db_name, $username);
}
catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}