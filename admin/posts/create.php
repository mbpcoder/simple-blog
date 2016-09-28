<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = 1;
    $connection = mysqli_connect('localhost', 'root', '2110', 'student_blog');
    $sql = "INSERT INTO posts (`title`, `body`, `user_id`) VALUES ('" . $_POST['title'] . "', '" . $_POST['body'] . "', '" . $user_id . "')";
    mysqli_query($connection, $sql);
    mysqli_close($connection);
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