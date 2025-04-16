<?php
require_once '../includes/auth.php';
require_login();
require_once '../includes/db.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM products WHERE id = $id");
}

header('Location: dashboard.php');
exit();
