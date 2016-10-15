<?php
require_once 'config.php';

// Post

function post_insert($post)
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    $sql = "INSERT INTO posts (`title`, `body`, `user_id`, `category_id`) VALUES ('" . $post['title'] . "', '" . $post['body'] . "', '" . $post['user_id'] . "', '" . $post['category_id'] . "')";
    mysqli_query($connection, $sql);
    mysqli_close($connection);
}

function post_update($post)
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    $sql = "UPDATE posts SET title='{$post['title']}', body='{$post['body']}', category_id='{$post['category_id']}' WHERE id={$post['id']}";
    mysqli_query($connection, $sql);
    mysqli_close($connection);
}

function post_delete($id)
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    $sql = "DELETE FROM posts WHERE id=" . $id;
    mysqli_query($connection, $sql);
    mysqli_close($connection);
}

function post_all()
{
    $posts = [];
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    $sql = 'SELECT * FROM posts';
    $result = mysqli_query($connection, $sql);
    while ($post = mysqli_fetch_assoc($result)) {
        $posts[] = $post;
    }
    mysqli_close($connection);
    return $posts;
}

function post_find_by_id($id)
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    $sql = 'SELECT * FROM posts WHERE id=' . $id;
    $result = mysqli_query($connection, $sql);
    $post = mysqli_fetch_assoc($result);
    mysqli_close($connection);
    return $post;
}

function post_find_by_category_id($category_id)
{
    $posts = [];
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    $sql = 'SELECT * FROM posts where category_id=' . $category_id;
    $result = mysqli_query($connection, $sql);
    while ($post = mysqli_fetch_assoc($result)) {
        $posts[] = $post;
    }
    mysqli_close($connection);
    return $posts;
}

// Category

function category_insert($category)
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    $sql = "INSERT INTO categories (`name`, `user_id`) VALUES ('" . $category['name'] . "', '" . $category['user_id'] . "')";
    mysqli_query($connection, $sql);
    mysqli_close($connection);
}

function category_update($category)
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    $sql = "UPDATE categories SET name='{$category['name']}' WHERE id={$category['id']}";
    mysqli_query($connection, $sql);
    mysqli_close($connection);
}

function category_delete($id)
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    $sql = "DELETE FROM categories WHERE id=" . $id;
    mysqli_query($connection, $sql);
    mysqli_close($connection);
}

function category_all()
{
    $categories = [];
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    $sql = 'SELECT * FROM categories';
    $result = mysqli_query($connection, $sql);
    while ($category = mysqli_fetch_assoc($result)) {
        $categories[] = $category;
    }
    mysqli_close($connection);
    return $categories;
}

function category_find_by_id($id)
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    $sql = 'SELECT * FROM categories WHERE id=' . $id;
    $result = mysqli_query($connection, $sql);
    $post = mysqli_fetch_assoc($result);
    mysqli_close($connection);
    return $post;
}

// User

function user_insert($user)
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    $sql = "INSERT INTO users (`name`, `email`, `password`) VALUES ('" . $user['name'] . "', '" . $user['email'] . "', '" . $user['password'] . "')";
    mysqli_query($connection, $sql);
    mysqli_close($connection);
}

function user_update($user)
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    $sql = "UPDATE users SET name='{$user['name']}', email='{$user['email']}', password='{$user['password']}' WHERE id={$user['id']}";
    mysqli_query($connection, $sql);
    mysqli_close($connection);
}

function user_delete($id)
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    $sql = "DELETE FROM users WHERE id=" . $id;
    mysqli_query($connection, $sql);
    mysqli_close($connection);
}

function user_all()
{
    $users = [];
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    $sql = 'SELECT * FROM users';
    $result = mysqli_query($connection, $sql);
    while ($user = mysqli_fetch_assoc($result)) {
        $users[] = $user;
    }
    mysqli_close($connection);
    return $users;
}

function user_find_by_id($id)
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    $sql = 'SELECT * FROM users WHERE id=' . $id;
    $result = mysqli_query($connection, $sql);
    $user = mysqli_fetch_assoc($result);
    mysqli_close($connection);
    return $user;
}

function user_find_by_email_and_password($email, $password)
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    $sql = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
    $result = mysqli_query($connection, $sql);
    $user = mysqli_fetch_assoc($result);
    mysqli_close($connection);
    return $user;
}
