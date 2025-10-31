<?php
include '../functions.php';
if (($_SESSION['role'] ?? '') !== 'admin') {
    header('Location: login.php');
    exit;
}
$regs = load_registrations();

if (isset($_POST['clear_all'])) {
    global $cookie_name;
    setcookie($cookie_name, '', time() - 3600, '/');
    header('Location: admin.php');
    exit;
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">
    <h2>Admin Panel</h2>
    <a href="logout.php">Logout</a><br><br>

    <h3>Data Pendaftar</h3>
    <?php if (!$regs): ?>
    <p>Belum ada pendaftar.</p>
    <?php else: ?>
    <table>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Instansi</th>
            <th>Tiket</th>
            <th>Tanggal</th>
        </tr>
        <?php foreach ($regs as $r): ?>
        <tr>
            <td><?= $r['name'] ?></td>
            <td><?= $r['email'] ?></td>
            <td><?= ($r['instansi'] ?? '') ?></td>
            <td><?= $r['ticket'] ?></td>
            <td><?= $r['registered_at'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <form method="post" style="margin-top:10px;">
        <button type="submit" name="clear_all">Hapus Semua Data</button>
    </form>
    <?php endif; ?>
</div>
</body>
</html>
