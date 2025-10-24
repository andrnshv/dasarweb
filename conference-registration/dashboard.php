<?php
include 'functions.php';
if (($_SESSION['role'] ?? '') !== 'user') {
    header('Location: login.php');
    exit;
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Dashboard Peserta</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Selamat Datang, <?= htmlspecialchars($_SESSION['name']) ?>!</h2>
    <p>Anda telah terdaftar dalam Conference ini.</p>
    <p class="small">Email: <?= htmlspecialchars($_SESSION['email']) ?></p>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>
