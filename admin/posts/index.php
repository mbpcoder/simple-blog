<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Posts List</title>
    <link rel="stylesheet" href="../../css/admin/posts/index.css">
</head>
<body>
<div>
    <h3>Posts Grid</h3>
    <div class="links">
        <a href="create.php">Create New Post</a>
        <a href="/admin/index.php">Admin Dashboard</a> 
    </div>
    <br>
    <?php
    require_once '../../lib/database.php';
    $posts = post_all();
    $table = '<table>';
    $table .= '
    <tr>
        <th>id</th>
        <th>title</th>
        <th>body</th>
        <th>User</th>
        <th>Created At</th>
        <th>Actions</th>
    </tr>';

    foreach ($posts as $post) {
      $table .= "
            <tr>
                <td>{$post['id']}</td>
                <td>{$post['title']}</td>
                <td>{$post['body']}</td>
                <td>{$post['user_id']}</td>
                <td>{$post['created_at']}</td>
                <td><a href=\"update.php?id={$post['id']}\">Update</a> <a href='delete.php?id={$post['id']}'>Delete</a></td>
            </tr>";
    }

    $table .= '<table>';
    echo $table;
    ?>
</div>
</body>
</html>
