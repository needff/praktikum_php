<?php
include "koneksi.php";

$id = $_GET['id'];
$query = "DELETE FROM mahasiswa WHERE id=$id";

if (mysqli_query($koneksi, $query)) {
    echo "Data berhasil dihapus! <br>";
    echo "<a href='index.php'>Kembali ke daftar</a>";
} else {
    echo "Error: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
