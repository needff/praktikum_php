<?php
    echo "<h1>Contoh Function di PHP</h1>";

    // Fungsi tanpa parameter
    function sapa() {
        echo "Halo, Selamat Datang di Praktikum PHP!<br>";
    }

    // Fungsi dengan parameter
    function luasPersegi($sisi) {
        return $sisi * $sisi;
    }

    // Fungsi dengan dua parameter
    function tambah($a, $b) {
        return $a + $b;
    }

    // Memanggil fungsi
    sapa();

    echo "Luas persegi dengan sisi 4 adalah: " . luasPersegi(4) . "<br>";
    echo "Hasil penjumlahan 10 + 5 adalah: " . tambah(10, 5) . "<br>";
?>
