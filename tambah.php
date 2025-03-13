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

// Tambah data ke database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $conn->query("INSERT INTO mahasiswa (nama, nim, jurusan) VALUES ('$nama', '$nim', '$jurusan')");
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>
    <form method="POST" action="">
        <label>Nama: <input type="text" name="nama" required></label><br>
        <label>NIM: <input type="text" name="nim" required></label><br>

        <!-- Dropdown untuk memilih jurusan -->
        <label>Jurusan:
            <select name="jurusan" required>
                <option value="" disabled selected>Pilih Jurusan</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Teknologi Informasi">Teknologi Informasi</option>
                <option value="Informatika">Informatika</option>
                <option value="Teknik Komputer">Teknik Komputer</option>
            </select>
        </label><br>

        <button type="submit">Tambah</button>
    </form>
    <a href="index.php">Kembali ke Dashboard</a>
</body>
</html>
