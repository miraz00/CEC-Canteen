<?php

function check_username($username): bool
{
    global $db;
    $query = 'select 1 from users where username = :username';
    $statement = $db->prepare($query);
    $statement->bindvalue(':username', $username);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();

    if($row)
        return true;
    return false;
}

function check_email($email): bool
{
    global $db;
    $query = 'select 1 from users where email = :email';
    $statement = $db->prepare($query);
    $statement->bindvalue(':email', $email);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();

    if($row)
        return true;
    return false;
}

function add_student($name, $email, $username, $password): bool
{
    global $db;
    $query = 'insert into users(name, email, username, password, tokens) values(:name, :email, :username, :password, 0)';
    return extracted($db, $query, $username, $name, $email, $password);
}

/**
 * @param PDO $db
 * @param string $query
 * @param $username
 * @param $name
 * @param $email
 * @param $password
 * @return bool
 */
function extracted(PDO $db, string $query, $username, $name, $email, $password): bool
{
    $statement = $db->prepare($query);
    $statement->bindvalue(':username', $username);
    $statement->bindvalue(':name', $name);
    $statement->bindvalue(':email', $email);
    $statement->bindvalue(':password', $password);
    try {
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        echo $e;
        return false;
    }
    return true;
}

function add_teacher($name, $email, $username, $password): bool
{
    global $db;
    $query = 'insert into users(name, email, username, password) values(:name, :email, :username, :password)';
    return extracted($db, $query, $username, $name, $email, $password);
}

function check($username, $password): bool
{
    global $db;
    $query = 'select id,name,password,tokens from users where username = :username';
    $statement = $db->prepare($query);
    $statement->bindvalue(':username', $username);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();

    if (password_verify($password, $row['password']))
    {
        session_unset();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['tokens'] = $row['tokens'];
        return true;
    }
    return false;
}

function user_details($username): array
{
    global $db;
    $query = 'select * from users where username = :username';
    $statement = $db->prepare($query);
    $statement->bindvalue(':username', $username);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();

    return $row;
}

function update_tokens(): void
{
    global $db;
    $query = 'update users set tokens = :tokens where id = :id';
    $statement = $db->prepare($query);
    $statement->bindvalue(':tokens', $_SESSION['tokens']);
    $statement->bindvalue(':id', $_SESSION['user_id']);
    $statement->execute();
    $statement->closeCursor();
}

function get_tokens($id): float
{
    global $db;
    $query = 'select tokens from users where id = :id';
    $statement = $db->prepare($query);
    $statement->bindvalue(':id', $id);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();

    return $row['tokens'];
}