<?php
include 'functions.php';
$errors = [];
$success = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $instansi = trim($_POST['instansi'] ?? '');
    $ticket = trim($_POST['ticket'] ?? '');

    if ($name === '') $errors[] = 'Nama harus diisi.';
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Email tidak valid.';
    if ($ticket === '') $errors[] = 'Pilih jenis tiket.';

    if (empty($errors)) {
        $regs = load_registrations();
        if (find_by_email($regs, $email) !== false) {
            $errors[] = 'Email sudah terdaftar.';
        } else {
            $regs[] = [
                'name' => htmlspecialchars($name, ENT_QUOTES),
                'email' => htmlspecialchars($email, ENT_QUOTES),
                'instansi' => htmlspecialchars($instansi, ENT_QUOTES),
                'ticket' => htmlspecialchars($ticket, ENT_QUOTES),
                'registered_at' => date('Y-m-d H:i:s')
            ];
            save_registrations($regs);
            setcookie('last_registered', $email, time() + 3600 * 24, '/');
            $success = 'Pendaftaran berhasil. Silakan masuk menggunakan email Anda.';
        }
    }
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Daftar Conference</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Form Pendaftaran</h2>
    <a href="index.php">← Kembali</a><br><br>

<?php if ($errors): ?>
    <div class="notice error">
        <?php foreach ($errors as $e) echo "<div>" . htmlspecialchars($e) . "</div>"; ?>
    </div>
<?php endif; ?>

<?php if ($success): ?>
    <div class="notice success"><?= htmlspecialchars($success) ?></div>
<?php endif; ?>

<form method="post">
    <label>Nama Lengkap:</label>
    <input type="text" name="name" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Instansi (Opsional):</label>
    <input type="text" name="instansi">

    <label>Jenis Tiket:</label>
    <select name="ticket" required>
        <option value="">-- Pilih --</option>
        <option value="regular">Regular</option>
        <option value="student">Student</option>
        <option value="vip">VIP</option>
    </select>

        <button type="submit">Kirim</button>
    </form>
</div>
</body>
</html>
