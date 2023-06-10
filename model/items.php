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