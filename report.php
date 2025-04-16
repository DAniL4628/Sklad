<?php
require_once '../includes/auth.php';
require_login();
require_once '../includes/db.php';
$result = $conn->query("SELECT name, quantity, created_at FROM products ORDER BY quantity DESC");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Отчёт по товарам</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
<h2>Отчёт по товарам</h2>
<table class="table table-bordered">
    <thead><tr><th>Название</th><th>Количество</th><th>Добавлен</th></tr></thead>
    <tbody>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= $row['quantity'] ?></td>
            <td><?= $row['created_at'] ?></td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
</body>
</html>