<?php
require_once '../../lib/auth.php';
if (!login_check()) {
    header('location:../login.php');
}

require_once '../../lib/database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    category_update($_POST);
    header('location:index.php');
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $category = category_find_by_id($id);
} else {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Category</title>
    <link rel="stylesheet" href="../../css/admin/categories/create.css">
</head>
<body>
<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $category['id'] ?>">
    <div>
        <label for="name">name: </label>
        <input type="text" name="name" id="name" value="<?php echo $category['name'] ?>">
    </div>
    <div>
        <label></label>
        <input type="submit" value="Update Category">
        <a href="index.php">Cancel</a>
    </div>
</form>
</body>
</html>
