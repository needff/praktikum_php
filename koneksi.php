<?php
$host = "localhost";
$user = "root";
$pass = ""; // Kosongkan jika tidak ada password
$db = "php_db";

// Koneksi ke database
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
