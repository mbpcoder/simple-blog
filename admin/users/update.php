<?php
include_once '../lib/auth.php';
if (!login_check()) {
    header('location:login.php');
}

require_once '../../lib/database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    user_update($_POST);
    header('location:index.php');
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $user = user_find_by_id($id);
} else {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update User</title>
    <link rel="stylesheet" href="../../css/admin/users/create.css">
</head>
<body>
  <form action="update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
      <div>
          <label for="name">name: </label>
          <input type="text" name="name" id="name" value="<?php echo $user['name'] ?>">
      </div>
      <div>
        <label for="name">email: </label>
        <input type="email" name="email" id="email" value="<?php echo $user['email'] ?>">
      </div>
      <div>
        <label for="name">password: </label>
        <input type="password" name="password" id="password" value="<?php echo $user['password'] ?>">
      </div>
      <div>
          <label></label>
          <input type="submit" value="Save User">
          <a href="index.php">Cancle</a>
      </div>
  </form>
</body>
</html>
