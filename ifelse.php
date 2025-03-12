<?php
    $nilai = 75;

    echo "<h1>Contoh If-Else di PHP</h1>";
    echo "Nilai Anda: $nilai <br>";

    if ($nilai >= 80) {
        echo "Grade: A (Lulus dengan Baik)";
    } elseif ($nilai >= 65) {
        echo "Grade: B (Lulus)";
    } elseif ($nilai >= 50) {
        echo "Grade: C (Lulus dengan Catatan)";
    } else {
        echo "Grade: D (Tidak Lulus)";
    }
?>
