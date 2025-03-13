<?php
// Koneksi ke database
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'php_db';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard Praktikum PHP</title>
</head>
<body>
    <h1>Dashboard Praktikum PHP</h1>

    <h3>Menu Praktikum:</h3>
    <ul>
        <li><a href="selamatdatang.html">Halaman Selamat Datang</a></li>
        <li><a href="var.php">Variabel PHP</a></li>
        <li><a href="aritmatika.php">Operator Aritmatika</a></li>
        <li><a href="perbandingan.php">Operator Perbandingan</a></li>
        <li><a href="ifelse.php">Kondisi If-Else</a></li>
        <li><a href="looping.php">Perulangan (Looping)</a></li>
        <li><a href="function.php">Fungsi di PHP</a></li>
        <li><a href="array.php">Array di PHP</a></li>
        <li><a href="form.html">Formulir Input Data</a></li>
    </ul>
    
</body>
</html>
