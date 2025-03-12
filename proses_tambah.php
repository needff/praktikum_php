<?php
include "koneksi.php";

$nama = $_POST['nama'];
$nim = $_POST['nim'];
$jurusan = $_POST['jurusan'];

$query = "INSERT INTO mahasiswa (nama, nim, jurusan) VALUES ('$nama', '$nim', '$jurusan')";

if (mysqli_query($koneksi, $query)) {
    echo "Data berhasil ditambahkan! <br>";
    echo "<a href='index.php'>Lihat Data</a>";
} else {
    echo "Error: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
