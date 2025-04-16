<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добро пожаловать на склад!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="d-flex align-items-center justify-content-center vh-100 bg-light">
    <div class="text-center">
        <h1 class="mb-4">Добро пожаловать в систему учёта склада!</h1>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="/pages/dashboard.php" class="btn btn-primary btn-lg">Перейти в панель управления</a>
        <?php else: ?>
            <a href="/pages/login.php" class="btn btn-success btn-lg me-2">Войти</a>
            <a href="/pages/register.php" class="btn btn-outline-primary btn-lg">Регистрация</a>
        <?php endif; ?>
    </div>
</body>
</html>
