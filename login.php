<?php
require_once '../includes/db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = $conn->query("SELECT * FROM users WHERE username = '$username'");
    $user = $result->fetch_assoc();
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: dashboard.php');
    } else {
        echo "Неверный логин или пароль!";
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
<h2>Вход</h2>
<form method="post">
    <input type="text" name="username" class="form-control mb-2" placeholder="Имя пользователя" required>
    <input type="password" name="password" class="form-control mb-2" placeholder="Пароль" required>
    <button class="btn btn-success">Войти</button>
</form>
</body>
</html>