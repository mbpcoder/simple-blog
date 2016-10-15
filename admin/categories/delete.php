<?php
require_once '../../lib/auth.php';
if (!login_check()) {
    header('location:../login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    require_once '../../lib/database.php';
    category_delete($id);
}
header('location:index.php');
