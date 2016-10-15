<?php
include_once '../lib/auth.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (login($_POST['email'], $_POST['password'])) {
        header('location:index.php');
    }else{
        header('location:login.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../css/admin/login.css">
</head>
<body>
<form action="login.php" method="post">
    <div>
        <label for="email">email: </label>
        <input type="email" name="email" id="email">
    </div
    <div>
        <label for="password">password: </label>
        <input type="password" name="password" id="password">
    </div>
    <div>
        <label></label>
        <input type="submit" value="Login">
        <a href="../index.php">Cancel</a>
    </div>
</form>
</body>
</html>