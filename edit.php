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

// Ambil data mahasiswa berdasarkan ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM mahasiswa WHERE id = $id");
    $mahasiswa = $result->fetch_assoc();

    if (!$mahasiswa) {
        die("Data tidak ditemukan!");
    }
}

// Proses update data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];

    $conn->query("UPDATE mahasiswa SET nama='$nama', nim='$nim', jurusan='$jurusan' WHERE id=$id");

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <title>Edit Mahasiswa</title>
</head>

<body>
    <h1>Edit Data Mahasiswa</h1>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?= $mahasiswa['id']; ?>">

        <label>Nama:
            <input type="text" name="nama" value="<?= $mahasiswa['nama']; ?>" required>
        </label><br>

        <label>NIM:
            <input type="text" name="nim" value="<?= $mahasiswa['nim']; ?>" required>
        </label><br>

        <!-- Dropdown untuk jurusan -->
        <label>Jurusan:
            <select name="jurusan" required>
                <option value="Sistem Informasi" <?= $mahasiswa['jurusan'] == 'Sistem Informasi' ? 'selected' : ''; ?>>Sistem Informasi</option>
                <option value="Teknologi Informasi" <?= $mahasiswa['jurusan'] == 'Teknologi Informasi' ? 'selected' : ''; ?>>Teknologi Informasi</option>
                <option value="Informatika" <?= $mahasiswa['jurusan'] == 'Informatika' ? 'selected' : ''; ?>>Informatika</option>
                <option value="Teknik Komputer" <?= $mahasiswa['jurusan'] == 'Teknik Komputer' ? 'selected' : ''; ?>>Teknik Komputer</option>
            </select>
        </label><br>

        <button type="submit">Update</button>
    </form>

    <a href="index.php">Kembali ke Dashboard</a>
</body>

</html>
