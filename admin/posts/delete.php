<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $connection = mysqli_connect('localhost', 'root', '2110', 'student_blog');
    $sql = "DELETE FROM posts WHERE id=" . $id;
    mysqli_query($connection, $sql);
    mysqli_close($connection);
}
header('location:index.php');
