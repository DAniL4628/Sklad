<?php
session_start();
require_once 'db.php';
function is_logged_in() {
    return isset($_SESSION['user_id']);
}
function require_login() {
    if (!is_logged_in()) {
        header('Location: /pages/login.php');
        exit();
    }
}
?>