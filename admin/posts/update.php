<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = 1;
    $connection = mysqli_connect('localhost', 'root', '2110', 'student_blog');
    $sql = "UPDATE posts SET title='{$_POST['title']}', body='{$_POST['body']}' WHERE id={$_POST['id']}";
    mysqli_query($connection, $sql);
    mysqli_close($connection);
    header('location:index.php');
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $connection = mysqli_connect('localhost', 'root', '2110', 'student_blog');
    $sql = 'SELECT * FROM posts WHERE id=' . $id;
    $result = mysqli_query($connection, $sql);
    $post = mysqli_fetch_assoc($result);
    mysqli_close($connection);
} else {
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
    <input type="hidden" name="id" value="<?php echo $post['id'] ?>">
    <div>
        <label for="title">title: </label>
        <input type="text" name="title" id="title" value="<?php echo $post['title'] ?>">
    </div>
    <div>
        <label for="body">body: </label>
        <textarea name="body" id="body" rows="10"><?php echo $post['body'] ?></textarea>
    </div>
    <div>
        <label></label>
        <input type="submit" value="Update Post">
        <a href="index.php">Cancle</a>
    </div>
</form>
</body>
</html>