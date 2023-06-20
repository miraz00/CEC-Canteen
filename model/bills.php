<?php

function  get_bills(): array
{
    global $db;
    $query = "select *, CONCAT(
    DATE_FORMAT(STR_TO_DATE(CONCAT('01-', month, '-', year), '%d-%m-%y'), '%M %Y')
    ) AS formatted_date from teacher_bills where teacher_id = :id order by year, month desc";
    $statement = $db->prepare($query);
    $statement->bindvalue(':id', $_SESSION['user_id']);
    $statement->execute();
    $bills = $statement->fetchAll();
    $statement->closeCursor();
    return $bills;
}