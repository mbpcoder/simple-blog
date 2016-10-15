<?php
    require_once '../../lib/auth.php';
if (!login_check()) {
    header('location:../login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../../lib/database.php';
    $category = [];
    $category['user_id'] = 1;
    $category['name'] = $_POST['name'];
    category_insert($category);
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Category</title>
    <link rel="stylesheet" href="../../css/admin/categories/create.css">
</head>
<body>
<form action="create.php" method="post">
    <div>
        <label for="name">name: </label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label></label>
        <input type="submit" value="Save Category">
        <a href="index.php">Cancel</a>
    </div>
</form>
</body>
</html>
