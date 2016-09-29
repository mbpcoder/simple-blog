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
    <title>Users List</title>
    <link rel="stylesheet" href="../../css/admin/users/index.css">
</head>
<body>
<div>
    <h3>Users Grid</h3>
    <div class="links">
        <a href="create.php">Create New User</a>
        <a href="/admin/index.php">Admin Dashboard</a>

    </div>
    <br>
    <?php
    require_once '../../lib/database.php';
    $users = user_all();
    $table = '<table>';
    $table .= '
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
        <th>is admin</th>
        <th>Discription</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>';

    foreach ($users as $user) {
      $table .= "
            <tr>
                <td>{$user['id']}</td>
                <td>{$user['name']}</td>
                <td>{$user['email']}</td>
                <td>{$user['is_admin']}</td>
                <td>{$user['description']}</td>
                <td>{$user['created_at']}</td>
                <td><a href=\"update.php?id={$user['id']}\">Update</a> <a href='delete.php?id={$user['id']}'>Delete</a></td>
            </tr>";
    }

    $table .= '<table>';
    echo $table;
    ?>
</div>
</body>
</html>
