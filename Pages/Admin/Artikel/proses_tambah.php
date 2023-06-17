<?php
// memanggil file link.php untuk melakukan koneksi ke database
include '../../../database/config.php';

// membuat variabel untuk menampung data dari form
$nama_artikel = mysqli_real_escape_string($link, $_POST['nama_artikel']);
$gambar_artikel = $_FILES['gambar_artikel']['name'];
$isi_artikel = mysqli_real_escape_string($link, $_POST['isi_artikel']);

// cek dulu jika ada gambar produk jalankan coding ini
if ($gambar_artikel != "") {
  $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg'); // ekstensi file gambar yang bisa diupload 
  $x = explode('.', $gambar_artikel); // memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['gambar_artikel']['tmp_name'];
  $angka_acak = rand(1, 999);
  $nama_gambar_baru = $angka_acak . '-' . $gambar_artikel; // menggabungkan angka acak dengan nama file sebenarnya

  if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru); // memindah file gambar ke folder gambar

    // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
    $query = "INSERT INTO artikel (nama_artikel, gambar_artikel, isi_artikel) VALUES ('$nama_artikel', '$nama_gambar_baru', '$isi_artikel')";
    $result = mysqli_query($link, $query);

    // periksa query apakah ada error
    if (!$result) {
      die("Query gagal dijalankan: " . mysqli_errno($link) . " - " . mysqli_error($link));
    } else {
      // tampilkan alert dan akan redirect ke halaman artikel.php
      echo "<script>alert('Data berhasil ditambah.');window.location='artikel.php';</script>";
    }
  } else {
    // jika file ekstensi tidak jpg dan png, tampilkan alert
    echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='artikel.php';</script>";
  }
} else {
  // jalankan query INSERT jika gambar tidak diunggah
  $query = "INSERT INTO artikel (nama_artikel, gambar_artikel, isi_artikel) VALUES ('$nama_artikel', '', '$isi_artikel')";
  $result = mysqli_query($link, $query);

  // periksa query apakah ada error
  if (!$result) {
    die("Query gagal dijalankan: " . mysqli_errno($link) . " - " . mysqli_error($link));
  } else {
    // tampilkan alert dan akan redirect ke halaman artikel.php
    echo "<script>alert('Data berhasil ditambah.');window.location='artikel.php';</script>";
  }
}
?>