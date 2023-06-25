<?php

function select_items($category_name): false|array
{
    global $db;
    $query = 'select items.name,price,quantity from category,items where category.id = items.category_id and category.name = :category_name';
    $statement = $db->prepare($query);
    $statement->bindvalue(':category_name', $category_name);
    $statement->execute();
    $rows = $statement->fetchAll();
    $statement->closeCursor();

    return $rows;
}


function all_items(): array
{
    global $db;
    $query = 'SELECT category_id,id,name,price,quantity FROM  items ;';
    $statement = $db->prepare($query);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}



function update_item_data($category_id, $id, $name, $price, $quantity)
{
    global $db;

    $query = 'UPDATE items SET category_id = :category_id, id= :id, price = :price, quantity = :quantity WHERE name = :name';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':quantity', $quantity);
    $statement->bindValue(':name', $name);

    $success = $statement->execute();
    $statement->closeCursor();

    return $success;
}


function delete_item_data($name)
{
    global $db;

    $query = 'DELETE FROM users WHERE name = :name';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);

    $success = $statement->execute();
    $statement->closeCursor();

    return $success;
}

function  add_item_data($category_id, $id, $name, $price, $quantity)
{
    global $db;

    $query = 'INSERT INTO items (category_id, id, name, price, quantity) VALUES (:category_id, :id, :name, :price, :quantity)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':quantity', $quantity);
   
    $success = $statement->execute();
    $statement->closeCursor();

    return $success;
}
