<?php
include '../functions.php';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = trim($_POST['admin_user']);
    $p = trim($_POST['admin_pass']);
    if ($u === ADMIN_USER && $p === ADMIN_PASS) {
        $_SESSION['role'] = 'admin';
        $_SESSION['name'] = 'Administrator';
        header('Location: admin.php');
        exit;
    } else {
        $errors[] = 'Kredensial admin salah.';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">
    <h2>Login Admin</h2>
    <a href="../index.php">← Kembali</a><br><br>

    <?php if ($errors): ?>
        <div class="notice error">
            <?php foreach ($errors as $e) echo "<div>$e</div>"; ?>
        </div>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="admin_user" placeholder="Username" required>
        <input type="password" name="admin_pass" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>
</body>
</html>
