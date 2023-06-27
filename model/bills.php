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
function  get_all_bills(): array
{
    $timezone = new DateTimeZone('Asia/Kolkata');
    $datetime = new DateTime('now', $timezone);
    $monthNumber = $datetime->format('n');

    global $db;
    $query = "select *, CONCAT(
    DATE_FORMAT(STR_TO_DATE(CONCAT('01-', month, '-', year), '%d-%m-%y'), '%M %Y')
    ) AS formatted_date, users.name from teacher_bills,users where users.id = teacher_bills.teacher_id and month != :month_number order by year, month desc";
    $statement = $db->prepare($query);
    $statement->bindValue(':month_number', $monthNumber);
    $statement->execute();
    $bills = $statement->fetchAll();
    $statement->closeCursor();
    return $bills;
}

function update_bill($bill_id, $paid): void
{

    global $db;
    if ($paid == 1)
    {
        $query = 'update teacher_bills set paid = 0  WHERE bill_id = :bill_id;';
    }
    else
    {
        $query = 'update teacher_bills set paid = 1  WHERE bill_id = :bill_id;';
    }
    $statement = $db->prepare($query);
    $statement->bindvalue(':bill_id', $bill_id);
    $statement->execute();
    $statement->closeCursor();

}