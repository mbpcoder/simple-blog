<?php
require_once '../../lib/auth.php';
if (!login_check()) {
    header('location:../login.php');
}

require_once '../../lib/database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    post_update($_POST);
    header('location:index.php');
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $post = post_find_by_id($id);
} else {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Post</title>
    <link rel="stylesheet" href="../../css/admin/posts/create.css">
</head>
<body>
<form action="update.php" method="post">
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
