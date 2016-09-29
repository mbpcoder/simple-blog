<?php
include_once '../lib/auth.php';
if (!login_check()) {
    header('location:login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../../lib/database.php';
    $post = [];
    $post['user_id'] = 1;
    $post['title'] = $_POST['title'];
    $post['body'] = $_POST['body'];
    post_insert($post);
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Post</title>
    <link rel="stylesheet" href="../../css/admin/posts/create.css">
</head>
<body>
<form action="create.php" method="post">
    <div>
        <label for="title">title: </label>
        <input type="text" name="title" id="title">
    </div>
    <div>
        <label for="body">body: </label>
        <textarea name="body" id="body" rows="10"></textarea>
    </div>
    <div>
        <label></label>
        <input type="submit" value="Save Post">
        <a href="index.php">Cancle</a>
    </div>
</form>
</body>
</html>
