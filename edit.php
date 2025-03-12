<?php
include 'koneksi.php';

$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $nim = htmlspecialchars($_POST['nim']);
    $jurusan = htmlspecialchars($_POST['jurusan']);

    mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', nim='$nim', jurusan='$jurusan' WHERE id=$id");

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <title>Edit Data Mahasiswa</title>
</head>

<body>
    <h1>Edit Data Mahasiswa</h1>
    <form action="" method="POST">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?= $data['nama']; ?>" required><br><br>

        <label>NIM:</label><br>
        <input type="text" name="nim" value="<?= $data['nim']; ?>" required><br><br>

        <label>Jurusan:</label><br>
        <select name="jurusan" required>
            <option value="Informatika" <?= $data['jurusan'] == "Informatika" ? "selected" : "" ?>>Informatika</option>
            <option value="Sistem Informasi" <?= $data['jurusan'] == "Sistem Informasi" ? "selected" : "" ?>>Sistem Informasi</option>
            <option value="Teknik Komputer" <?= $data['jurusan'] == "Teknik Komputer" ? "selected" : "" ?>>Teknik Komputer</option>
            <option value="Teknologi Informasi" <?= $data['jurusan'] == "Teknologi Informasi" ? "selected" : "" ?>>Teknologi Informasi</option>
        </select><br><br>

        <button type="submit">Update</button>
        <a href="index.php">Batal</a>
    </form>
</body>

</html>
