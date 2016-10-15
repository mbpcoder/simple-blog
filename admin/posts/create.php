<?php
require_once '../../lib/auth.php';
if (!login_check()) {
    header('location:../login.php');
}
require_once '../../lib/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post = [];
    $post['user_id'] = 1;
    $post['category_id'] = $_POST['category_id'];
    $post['title'] = $_POST['title'];
    $post['body'] = $_POST['body'];
    post_insert($post);
    header('location:index.php');
}
$categories = category_all();
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
        <label for="category_id">Category: </label>
        <select name="category_id" id="category_id">
            <option value="0">Select A Category</option>
            <?php
            $html = '';
            foreach ($categories as $category) {
                $html .= "<option value='{$category['id']}'>{$category['name']}</option>";
            }
            echo $html;
            ?>
        </select>
    </div>
    <div>
        <label for="body">body: </label>
        <textarea name="body" id="body" rows="10"></textarea>
    </div>
    <div>
        <label></label>
        <input type="submit" value="Save Post">
        <a href="index.php">Cancel</a>
    </div>
</form>
</body>
</html>
