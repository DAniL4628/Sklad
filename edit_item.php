<?php
require_once '../includes/auth.php';
require_login();
require_once '../includes/db.php';

if (!isset($_GET['id'])) {
    header('Location: dashboard.php');
    exit();
}

$id = intval($_GET['id']);
$product = $conn->query("SELECT * FROM products WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $quantity = intval($_POST['quantity']);
    $conn->query("UPDATE products SET name = '$name', quantity = $quantity WHERE id = $id");
    header('Location: dashboard.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактировать товар</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
<h2>Редактировать товар</h2>
<form method="post">
    <input type="text" name="name" class="form-control mb-2" value="<?= htmlspecialchars($product['name']) ?>" required>
    <input type="number" name="quantity" class="form-control mb-2" value="<?= $product['quantity'] ?>" required>
    <button class="btn btn-primary">Сохранить</button>
</form>
</body>
</html>
