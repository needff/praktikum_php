<?php
    echo "<h1>Contoh Array di PHP</h1>";

    // Array indeks (numerik)
    $buah = ["Apel", "Jeruk", "Mangga", "Pisang"];
    
    echo "<h3>Array Indeks:</h3>";
    foreach ($buah as $b) {
        echo "Buah: $b <br>";
    }

    // Array asosiatif
    $mahasiswa = [
        "nama" => "Andi",
        "nim" => "20241001",
        "jurusan" => "Informatika"
    ];

    echo "<h3>Array Asosiatif:</h3>";
    echo "Nama: " . $mahasiswa["nama"] . "<br>";
    echo "NIM: " . $mahasiswa["nim"] . "<br>";
    echo "Jurusan: " . $mahasiswa["jurusan"] . "<br>";

    // Array multidimensi
    $kelas = [
        ["Andi", "20241001", "Informatika"],
        ["Budi", "20241002", "Sistem Informasi"],
        ["Citra", "20241003", "Teknik Komputer"]
    ];

    echo "<h3>Array Multidimensi:</h3>";
    foreach ($kelas as $mhs) {
        echo "Nama: $mhs[0], NIM: $mhs[1], Jurusan: $mhs[2] <br>";
    }
?>
