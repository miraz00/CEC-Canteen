<?php

function update_orders($cart): void
{
    global $db;
    $query = 'insert into order_history(user_id) values(:id)';
    $statement = $db->prepare($query);
    $statement->bindvalue(':id', $_SESSION['user_id']);
    $statement->execute();
    $statement->closeCursor();

    $query = 'select id from order_history where user_id = :user_id';
    $statement = $db->prepare($query);
    $statement->bindvalue(':id', $_SESSION['user_id']);
    $statement->execute();
    $order_id = $statement->fetch();
    $statement->closeCursor();

    $selectQuery = 'select id from items where name = :item_name';
    $selectStatement = $db->prepare($selectQuery);

    $insertQuery = 'insert into order_items values (:order_id, :item_id, :item_name, :item_price, :item_quantity)';
    $insertStatement = $db->prepare($insertQuery);

    foreach ($cart as $item)
    {
        $selectStatement->bindvalue(':item_name', $item['name']);
        $selectStatement->execute();
        $item_id = $selectStatement->fetch();
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

function get_orders(): false|array
{
    global $db;
    $query = 'select * from order_history where user_id = :id';
    $statement = $db->prepare($query);
    $statement->bindvalue(':id', $_SESSION['user_id']);
    $statement->execute();
    $orders = $statement->fetchAll();
    $statement->closeCursor();
    return $orders;
}

function get_items($order_id): false|array
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