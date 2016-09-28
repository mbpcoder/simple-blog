<?php
$id = $_GET['id'];
$connection = mysqli_connect('localhost', 'root', '2110', 'student_blog');
$sql = 'SELECT * FROM users WHERE id=' . $id;
$result = mysqli_query($connection, $sql);

$user = mysqli_fetch_assoc($result);

mysqli_close($connection);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <style>
        label {
            display: inline-block;
            width: 70px;
            text-align: right;
        }

        div {
            margin: 5px;;
        }
    </style>
</head>
<body>
<form action="processRegister.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <div>
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" value="<?php echo $user['name']?>">
    </div>
    <div>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" value="<?php echo $user['email']?>">
    </div>
    <div>
        <label for="password">Password: </label>
        <input type="text" name="password" id="password" value="<?php echo $user['password']?>">
    </div>
    <div>
        <label></label>
        <input type="submit" value="Update">
    </div>
</form>
</body>
</html>