<?php
include_once 'utility.php';
session_start();
function login($email, $password)
{
    $success = false;
    $connection = mysqli_connect('localhost', 'root', '2110', 'student_blog');
    $sql = "SELECT * FROM users WHERE email='{$email}' AND password='{$password}'";
    $result = mysqli_query($connection, $sql);
    if ($user = mysqli_fetch_assoc($result)) {
        $success = true;
        $_SESSION['username'] = hash_make($email);
    }
    mysqli_close($connection);
    return $success;
}

function logout($url = 'login.php')
{
    unset($_SESSION['username']);
    header("location:$url");
}

function login_check()
{
    $success = false;
    if (isset($_SESSION['username'])) {
        $success = true;
    }
    return $success;
}

function login_user()
{
}