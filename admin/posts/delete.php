<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    require_once '../../lib/database.php';
    post_delete($id);
}
header('location:index.php');
