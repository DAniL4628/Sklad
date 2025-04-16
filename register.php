<?php
require_once '../includes/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $conn->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
<h2>Регистрация</h2>
<form method="post">
    <input type="text" name="username" class="form-control mb-2" placeholder="Имя пользователя" required>
    <input type="password" name="password" class="form-control mb-2" placeholder="Пароль" required>
    <button class="btn btn-primary">Зарегистрироваться</button>
</form>
</body>
</html>