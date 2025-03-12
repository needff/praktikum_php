<?php
    echo "<h1>Contoh Looping di PHP</h1>";

    // Perulangan For
    echo "<h3>Perulangan For:</h3>";
    for ($i = 1; $i <= 5; $i++) {
        echo "Angka ke-$i <br>";
    }

    // Perulangan While
    echo "<h3>Perulangan While:</h3>";
    $j = 1;
    while ($j <= 5) {
        echo "Iterasi ke-$j <br>";
        $j++;
    }

    // Perulangan Do-While
    echo "<h3>Perulangan Do-While:</h3>";
    $k = 1;
    do {
        echo "Hitungan ke-$k <br>";
        $k++;
    } while ($k <= 5);
?>
