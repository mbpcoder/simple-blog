<?php

require_once '../../lib/auth.php';
if (!login_check()) {
    header('location:../login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../../lib/database.php';
    $user = $_POST;
    user_insert($user);
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create User</title>
    <link rel="stylesheet" href="../../css/admin/users/create.css">
</head>
<body>
<form action="create.php" method="post">
    <div>
        <label for="name">name: </label>
        <input type="text" name="name" id="name">
    </div>
    <div>
      <label for="name">email: </label>
      <input type="email" name="email" id="email">
    </div>
    <div>
      <label for="name">password: </label>
      <input type="password" name="password" id="password">
    </div>
    <div>
        <label></label>
        <input type="submit" value="Save User">
        <a href="index.php">Cancel</a>
    </div>
</form>
</body>
</html>
