<?php
require_once '../includes/auth.php';
require_login();
require_once '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $quantity = intval($_POST['quantity']);
    $conn->query("INSERT INTO products (name, quantity) VALUES ('$name', $quantity)");
    header('Location: dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить товар</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
<h2>Добавить товар</h2>
<form method="post">
    <input type="text" name="name" class="form-control mb-2" placeholder="Название товара" required>
    <input type="number" name="quantity" class="form-control mb-2" placeholder="Количество" required>
    <button class="btn btn-success">Добавить</button>
</form>
</body>
</html>
