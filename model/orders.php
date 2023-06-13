<?php

function update_orders($cart): void
{
    global $db;
    $query = 'insert into order_history(user_id) values(:id)';
    $statement = $db->prepare($query);
    $statement->bindvalue(':id', $_SESSION['user_id']);
    $statement->execute();
    $statement->closeCursor();

    $query = 'select max(id) as id from order_history where user_id = :user_id';
    $statement = $db->prepare($query);
    $statement->bindvalue(':user_id', $_SESSION['user_id']);
    $statement->execute();
    $result = $statement->fetch();
    $order_id = $result['id'];
    $statement->closeCursor();

    if ($_SESSION['account'] == 'teacher')
    {
        $query = 'insert into teacher_records(teacher_id, order_id) values(:id, :order_id)';
        $statement = $db->prepare($query);
        $statement->bindvalue(':id', $_SESSION['user_id']);
        $statement->bindvalue(':order_id', $order_id);
        $statement->execute();
        $statement->closeCursor();

        $timezone = new DateTimeZone('Asia/Kolkata');
        $datetime = new DateTime('now', $timezone);
        $monthNumber = $datetime->format('n');
        $yearNumber = $datetime->format('y');
        try {
            $query = 'insert into teacher_bills(teacher_id, month, year, billed_amt) values(:id, :month, :year, :amount)';
            $statement = $db->prepare($query);
            $statement->bindvalue(':id', $_SESSION['user_id']);
            $statement->bindvalue(':month', $monthNumber);
            $statement->bindvalue(':year', $yearNumber);
            $statement->bindvalue(':amount', $_SESSION['total']);
            $statement->execute();
            $statement->closeCursor();
        }
        catch (Exception $e)
        {
            $query = 'select bill_id, billed_amt from teacher_bills where teacher_id = :id and year =:year and month = :month';
            $statement = $db->prepare($query);
            $statement->bindvalue(':id', $_SESSION['user_id']);
            $statement->bindvalue(':month', $monthNumber);
            $statement->bindvalue(':year', $yearNumber);
            $statement->execute();
            $result = $statement->fetch();
            $bill_id = $result['bill_id'];
            $amount = $_SESSION['total'] + $result['billed_amt'];
            $statement->closeCursor();

            $query = 'update teacher_bills set billed_amt = :amount where bill_id = :bill_id';
            $statement = $db->prepare($query);
            $statement->bindvalue(':amount', $amount);
            $statement->bindvalue(':bill_id', $bill_id);
            $statement->execute();
            $statement->closeCursor();
        }
    }

    $selectQuery = 'select id from items where name = :item_name';
    $selectStatement = $db->prepare($selectQuery);

    $insertQuery = 'insert into order_items values (:order_id, :item_id, :item_name, :item_price, :item_quantity)';
    $insertStatement = $db->prepare($insertQuery);

    foreach ($cart as $item)
    {
        $selectStatement->bindvalue(':item_name', $item['name']);
        $selectStatement->execute();
        $result = $selectStatement->fetch();
        $item_id = $result['id'];
        $selectStatement->closeCursor();

        $insertStatement->bindvalue(':order_id', $order_id);
        $insertStatement->bindvalue(':item_id', $item_id);
        $insertStatement->bindvalue(':item_name', $item['name']);
        $insertStatement->bindvalue(':item_price', $item['price']);
        $insertStatement->bindvalue(':item_quantity', $item['count']);
        $insertStatement->execute();
        $insertStatement->closeCursor();
    }
}

function get_orders(): array
{
    global $db;
    $query = 'select * from order_history where user_id = :id order by id desc';
    $statement = $db->prepare($query);
    $statement->bindvalue(':id', $_SESSION['user_id']);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();
    return $orders;
}

function get_items($order_id): array
{
    global $db;
    $query = 'select * from order_items where id = :order_id';
    $statement = $db->prepare($query);
    $statement->bindvalue(':order_id', $order_id);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}

function orders_summary($month, $year) : array
{
    global $db;
    $query='SELECT 
        oh.id AS order_id,
        DATE_FORMAT(oh.ordered_on, "%e %M, %W %T") AS order_time,
        SUM(oi.item_price * oi.item_quantity) AS order_price
    FROM 
        order_history oh
    JOIN 
        order_items oi ON oh.id = oi.id
    WHERE 
        MONTH(oh.ordered_on) = :month AND
        RIGHT(YEAR(oh.ordered_on), 2) = :year
    GROUP BY 
        oh.id, oh.ordered_on
    ORDER BY 
    order_id DESC
    ';
    $statement = $db->prepare($query);
    $statement->bindvalue(':month', $month);
    $statement->bindvalue(':year', $year);
    $statement->execute();
    $orders_summary = $statement->fetchAll();
    $statement->closeCursor();
    return $orders_summary;
}