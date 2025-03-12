<?php
    echo "<h1>Hasil Data Mahasiswa</h1>";

    // Ambil data dari form
    $nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : "Tidak ada";
    $nim = isset($_POST['nim']) ? htmlspecialchars($_POST['nim']) : "Tidak ada";
    $jurusan = isset($_POST['jurusan']) ? htmlspecialchars($_POST['jurusan']) : "Tidak ada";

    // Tampilkan hasil
    echo "Nama: $nama <br>";
    echo "NIM: $nim <br>";
    echo "Jurusan: $jurusan <br>";
?>
