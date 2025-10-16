<?php
if (isset($_FILES['file'])) {
    $errors = array();
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    // Ambil ekstensi file
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // Ekstensi yang diizinkan
    $extensions = array("jpg", "jpeg", "png", "gif");

    // Validasi ekstensi
    if (!in_array($file_ext, $extensions)) {
        $errors[] = "Hanya file gambar (JPG, JPEG, PNG, GIF) yang diizinkan.";
    }

    // Maksimal 2 MB
    if ($file_size > 2097152) {
        $errors[] = 'Ukuran gambar tidak boleh lebih dari 2 MB.';
    }

    // Jika validasi lolos
    if (empty($errors)) {
        if (!is_dir("uploads")) {
            mkdir("uploads", 0777, true);
        }

        move_uploaded_file($file_tmp, "uploads/" . $file_name);
        echo "Gambar berhasil diunggah.";
    } else {
        echo implode(" ", $errors);
    }
}
?>
