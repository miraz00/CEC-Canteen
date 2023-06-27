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
    $query = 'SELECT category.name as category_name, items.name,items.price,items.quantity FROM  items,category WHERE category.id=items.category_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
}



/* function update_item_data($category_name, $name, $price, $quantity)
{
    global $db;

    $query = 'UPDATE items SET category_name = :category_name, price = :price, quantity = :quantity WHERE name = :name';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_name', $category_name);
    
    $statement->bindValue(':price', $price);
    $statement->bindValue(':quantity', $quantity);
    $statement->bindValue(':name', $name);

    $success = $statement->execute();
    $statement->closeCursor();

    return $success;
}
 */

 
 function update_item_data($category_id, $name, $price, $quantity)
 {
     global $db;
 
     // Update the item data in the items table
     $item_update_query = 'UPDATE items SET category_id = :category_id, price = :price, quantity = :quantity WHERE name = :name';
     $item_update_statement = $db->prepare($item_update_query);
     $item_update_statement->bindValue(':category_id', $category_id);
     $item_update_statement->bindValue(':price', $price);
     $item_update_statement->bindValue(':quantity', $quantity);
     $item_update_statement->bindValue(':name', $name);
     $success = $item_update_statement->execute();
     $item_update_statement->closeCursor();
 
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



function add_item_data($category_name, $name, $price, $quantity)
{
    global $db;

    // Check if the category exists
    $category_check_query = 'SELECT id FROM category WHERE name = :category_name';
    $category_check_statement = $db->prepare($category_check_query);
    $category_check_statement->bindValue(':category_name', $category_name);
    $category_check_statement->execute();
    $category_id = $category_check_statement->fetchColumn();
    $category_check_statement->closeCursor();

    // If the category doesn't exist, insert it into the category table
    if (!$category_id) {
        $category_insert_query = 'INSERT INTO category (name) VALUES (:category_name)';
        $category_insert_statement = $db->prepare($category_insert_query);
        $category_insert_statement->bindValue(':category_name', $category_name);
        $category_insert_statement->execute();
        $category_id = $db->lastInsertId();
        $category_insert_statement->closeCursor();
    }

    // Insert the new item data into the items table
    $item_insert_query = 'INSERT INTO items (category_id, name, price, quantity) VALUES (:category_id, :name, :price, :quantity)';
    $item_insert_statement = $db->prepare($item_insert_query);
    $item_insert_statement->bindValue(':category_id', $category_id);
    $item_insert_statement->bindValue(':name', $name);
    $item_insert_statement->bindValue(':price', $price);
    $item_insert_statement->bindValue(':quantity', $quantity);
    $item_insert_statement->execute();
    $item_insert_statement->closeCursor();

    return $item_insert_statement;
}

function all_categories(): array
{
    global $db;
    $query = 'SELECT category.name as category_name FROM  category';
    $statement = $db->prepare($query);
    $statement->execute();
    $category = $statement->fetchAll();
    $statement->closeCursor();
    return $category;
}