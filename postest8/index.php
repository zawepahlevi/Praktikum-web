<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data nilai mata kuliah dari formulir
    $nilai_matkul1 = isset($_POST['nilai_matkul1']) ? floatval($_POST['nilai_matkul1']) : 0;
    
    // Mengambil nilai-nilai mata kuliah tambahan dari formulir
    $nilai_matkul_tambahan = [];
    for ($i = 2; isset($_POST['nilai_matkul' . $i]); $i++) {
        $nilai_matkul_tambahan[] = floatval($_POST['nilai_matkul' . $i]);
    }

    // Menggabungkan nilai-nilai mata kuliah
    $nilai_matkul = array_merge([$nilai_matkul1], $nilai_matkul_tambahan);

    // Menghitung rata-rata
    $jumlah_matkul = count($nilai_matkul);
    $total_nilai = array_sum($nilai_matkul);
    $IPK = $jumlah_matkul > 0 ? ($total_nilai / ($jumlah_matkul*100))*4 : 0;

    // Menentukan status kelulusan
    $status_kelulusan = $IPK > 2.0 ? "Anda Lulus!" : "Anda Tidak Lulus!";

    // Menampilkan hasil dengan dua digit desimal
    echo "<h2>Hasil:</h2>";
    echo "<p>Rata-rata Nilai: " . number_format($IPK, 2) . "</p>";
    echo "<p>Status Kelulusan: $status_kelulusan</p>";

    // Tombol Kembali
    echo '<br><a href="index.html">Kembali</a>';
}
?>