<?php
include 'functions.php';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Masukkan email yang valid.';
    } else {
        $regs = load_registrations();
        $idx = find_by_email($regs, $email);
        if ($idx === false) {
            $errors[] = 'Email belum terdaftar. Silakan daftar terlebih dahulu.';
        } else {
            $_SESSION['role'] = 'user';
            $_SESSION['email'] = $regs[$idx]['email'];
            $_SESSION['name'] = $regs[$idx]['name'];
            header('Location: dashboard.php');
            exit;
        }
    }
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Login Peserta</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Login Peserta</h2>
  <a href="index.php">← Kembali</a><br><br>

  <?php if ($errors): ?>
    <div class="notice error">
      <?php foreach ($errors as $e) echo "<div>" . htmlspecialchars($e) . "</div>"; ?>
    </div>
  <?php endif; ?>

  <form method="post">
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Login</button>
  </form>
</div>
</body>
</html>
