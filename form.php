<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "php_db";
$conn = new mysqli($host, $user, $pass, $db);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tambah Data
if (isset($_POST['submit'])) {
    $nama    = $_POST['nama'];
    $nim     = $_POST['nim'];
    $jurusan = $_POST['jurusan'];

    $query = "INSERT INTO mahasiswa (nama, nim, jurusan) VALUES ('$nama', '$nim', '$jurusan')";
    $conn->query($query);
    header("Location: form.php");
    exit();
}

// Hapus Data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM mahasiswa WHERE id=$id");
    header("Location: form.php");
    exit();
}

// Udate Data
if (isset($_POST['update'])) {
    $id      = $_POST['id'];
    $nama    = $_POST['nama'];
    $nim     = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    

    $query = "UPDATE mahasiswa SET nama='$nama', nim='$nim', jurusan='$jurusan' WHERE id=$id";
    $conn->query($query);
    header("Location: form.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <title>Data Mahasiswa</title>
</head>

<body>
    <h1>Data Mahasiswa</h1>

    <!-- Tombol Kembali ke Dashboard -->
    <a href="form.html">⬅️ Kembali ke Input Data</a>

    <br><br>


    <!-- Tabel Data Mahasiswa -->
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Jurusan</th>            
            <th>Aksi</th>
        </tr>

        <?php
        $result = $conn->query("SELECT * FROM mahasiswa");
        while ($row = $result->fetch_assoc()) :
        ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['nim']; ?></td>
                <td><?= $row['jurusan']; ?></td>
              
                <td>
                    <!-- Tombol Edit -->
                    <a href="form.php?edit=<?= $row['id']; ?>">Edit</a> |
                    <!-- Tombol Hapus -->
                    <a href="form.php?hapus=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
<!-- Form Edit Data -->
<?php if (isset($_GET['edit'])):
        $id = $_GET['edit'];
        $editData = $conn->query("SELECT * FROM mahasiswa WHERE id=$id")->fetch_assoc();
    ?>
        <hr>
        <h2>Edit Data Mahasiswa</h2>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $editData['id']; ?>">

            <label>Nama:</label><br>
            <input type="text" name="nama" value="<?= $editData['nama']; ?>" required><br><br>

            <label>NPM:</label><br>
            <input type="text" name="nim" value="<?= $editData['nim']; ?>" required><br><br>

            <select name="jurusan" required>
                <option value="Sistem Informasi" <?= ($editData['jurusan'] == 'Sistem Informasi') ? 'selected' : ''; ?>>Sistem Informasi</option>
                <option value="Teknologi Informasi" <?= ($editData['jurusan'] == 'Teknologi Informasi') ? 'selected' : ''; ?>>Teknologi Informasi</option>
                <option value="Informatika" <?= ($editData['jurusan'] == 'Informatika') ? 'selected' : ''; ?>>Informatika</option>
            </select><br><br>

           

            <button type="submit" name="update">Update Data</button>
            <a href="form.php">Batal</a>
        </form>
    <?php endif; ?>
   
</body>

</html>
