<?php
date_default_timezone_set("Asia/Jakarta");

$koneksi = pg_connect("host=localhost dbname=prakwebdb_2 user=postgres password='1234' port=5432");

if (!$koneksi) {
    die("Koneksi database gagal: " . pg_last_error());
}
?>