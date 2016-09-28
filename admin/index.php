<?php
include_once '../lib/auth.php';

if (!login_check()) {
    header('location:login.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/admin/index.css">
</head>
<body>
<header>
    <h2>Admin Dashboardz</h2>
</header>
<div class="container">
    <a href="logout.php">Logout</a>
    <div><a href="posts/index.php">Posts</a></div>
    <div><a href="users/index.php">Users</a></div>
</div>
</body>
</html>