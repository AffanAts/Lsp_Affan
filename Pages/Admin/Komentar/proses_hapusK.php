<?php
include '../../../database/config.php';
$id_komentar = $_GET["id_komentar"];
//mengambil id yang ingin dihapus

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM komentar WHERE id_komentar='$id_komentar' ";
    $hasil_query = mysqli_query($link, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($link).
       " - ".mysqli_error($link));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='komentar.php';</script>";
    }