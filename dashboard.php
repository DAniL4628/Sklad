<?php
require_once '../includes/auth.php';
require_login();
require_once '../includes/db.php';
$result = $conn->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Склад - Панель</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
<h1>Товары на складе</h1>
<a href="add_item.php" class="btn btn-primary mb-3">Добавить товар</a>
<table class="table table-striped">
    <thead><tr><th>ID</th><th>Название</th><th>Количество</th><th>Действия</th></tr></thead>
    <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= $row['quantity'] ?></td>
            <td>
                <a href="edit_item.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Редактировать</a>
                <a href="delete_item.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Удалить товар?');">Удалить</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
</body>
</html>