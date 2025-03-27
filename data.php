<?php
header('Content-Type: application/json');
$host = "localhost";
$user = "root";
$pass = "";
$db = "php_db";

// Koneksi ke database
$koneksi = new mysqli($host, $user, $pass, $db);

if ($koneksi->connect_error) {
    die(json_encode(["error" => "Gagal koneksi ke database"]));
}

// Query untuk mengambil data jumlah mahasiswa per jurusan
$sql = "SELECT jurusan, COUNT(*) as jumlah FROM mahasiswa GROUP BY jurusan";
$result = $koneksi->query($sql);

$labels = [];
$values = [];

while ($row = $result->fetch_assoc()) {
    $labels[] = $row['jurusan'];
    $values[] = $row['jumlah'];
}

$koneksi->close();

// Output dalam format JSON
echo json_encode(["labels" => $labels, "values" => $values]);
?>
