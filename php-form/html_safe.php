<!DOCTYPE html>
<html>
<head>
    <title>Form Input Aman & Validasi</title>
</head>
<body>

<?php
$nama = "";
$email = "";
$nama_error = "";
$email_error = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST['nama'])) {
        $nama_error = "Nama harus diisi!";
    } else {
        $nama = htmlspecialchars($_POST['nama'], ENT_QUOTES, 'UTF-8');
    }

    if (empty($_POST['email'])) {
        $email_error = "Email harus diisi!";
    } else {
        $email_input = trim($_POST['email']);
        if (!filter_var($email_input, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Format email tidak valid.";
        } else {
            $email = htmlspecialchars($email_input, ENT_QUOTES, 'UTF-8');
        }
    }

    if (empty($nama_error) && empty($email_error)) {
        $message = "Data berhasil divalidasi dan aman!<br>";
        $message .= "Nama: <strong>" . $nama . "</strong><br>";
        $message .= "Email: <strong>" . $email . "</strong><br><br>";
        
        $nama = "";
        $email = "";
    } else {
        $nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama'], ENT_QUOTES, 'UTF-8') : '';
        $email = isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8') : '';
    }
}
?>

<?php echo $message; ?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="nama_field">Masukkan Nama:</label><br>
    <input type="text" id="nama_field" name="nama" value="<?php echo $nama; ?>" size="50"><br>
    <span style="color:red;"><?php echo $nama_error; ?></span>
    <br><br>

    <label for="email_field">Masukkan Email:</label><br>
    <input type="text" id="email_field" name="email" value="<?php echo $email; ?>" size="50"><br>
    <span style="color:red;"><?php echo $email_error; ?></span>
    <br><br>
    
    <input type="submit" value="Kirim Data">
</form>

</body>
</html>