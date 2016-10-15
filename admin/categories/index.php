<?php
require_once '../../lib/auth.php';
if (!login_check()) {
    header('location:../login.php');
}
 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Categories List</title>
    <link rel="stylesheet" href="../../css/admin/categories/index.css">
</head>
<body>
<div>
    <h3>Categories Grid</h3>
    <div class="links">
        <a href="create.php">Create New Category</a>
        <a href="/admin/index.php">Admin Dashboard</a>
    </div>
    <br>
    <?php
    require_once '../../lib/database.php';
    $categories = category_all();
    $table = '<table>';
    $table .= '
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>User Id</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>';

    foreach ($categories as $category) {
      $table .= "
            <tr>
                <td>{$category['id']}</td>
                <td>{$category['name']}</td>                
                <td>{$category['user_id']}</td>
                <td>{$category['created_at']}</td>
                <td><a href=\"update.php?id={$category['id']}\">Update</a> <a href='delete.php?id={$category['id']}'>Delete</a></td>
            </tr>";
    }

    $table .= '<table>';
    echo $table;
    ?>
</div>
</body>
</html>
