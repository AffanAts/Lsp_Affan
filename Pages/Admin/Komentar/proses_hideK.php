<?php
include '../../../database/config.php';

if (isset($_GET["id_komentar"]) && isset($_GET["status"])) {
    $id_komentar = $_GET["id_komentar"];
    $status = $_GET["status"];

    // Periksa apakah status yang dimasukkan adalah angka 0 atau 1
    if ($status != 0 && $status != 1) {
        die("Status tidak valid.");
    }

    // Jalankan query UPDATE untuk mengubah status_hide komentar
    $query = "UPDATE komentar SET status_hide = $status WHERE id_komentar = '$id_komentar'";
    $hasil_query = mysqli_query($link, $query);

    // Periksa apakah query berjalan dengan benar
    if (!$hasil_query) {
        die("Gagal menyimpan status komentar: " . mysqli_errno($link) . " - " . mysqli_error($link));
    } else {
        if ($status == 0) {
            echo "<script>alert('Komentar berhasil diunhide.');window.location='komentar.php';</script>";
        } else {
            echo "<script>alert('Komentar berhasil dihide.');window.location='komentar.php';</script>";
        }
    }
} else {
    die("Permintaan tidak valid.");
}
?>
