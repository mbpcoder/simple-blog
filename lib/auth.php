<?php
session_start();

require_once 'utility.php';
require_once 'database.php';

function login($email, $password)
{
  $success = false;

  $user = user_find_by_email_and_password($email, $password);
  if($user){
      $_SESSION['username'] = hash_make($email);
      $success = true;
  }
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
