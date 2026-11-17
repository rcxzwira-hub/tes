<?php
// Latihan6.php
if (isset($_GET['fname']) && isset($_GET['lname'])) {
    // Mengubah input string dari GET menjadi float agar perhitungan akurat
    $nilaiA = (float) $_GET['fname'];
    $nilaiB = (float) $_GET['lname'];

    $rata = ($nilaiA + $nilaiB) / 2;
    
    // Cek hasilnya
    echo "Rata-rata: " . $rata . "<br>";

    // Percabangan bertingkat
    if ($rata >= 8) {
        echo "Sangat Baik";
    } else if ($rata >= 7) {
        echo "Baik";
    } else if ($rata >= 6) {
        echo "Cukup";
    } else {
        echo "Kurang";
    }
} else {
    echo "Data belum diisi";
}
?>