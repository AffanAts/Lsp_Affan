<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include '../../../database/config.php';

// membuat variabel untuk menampung data dari form
$id_artikel = $_POST['id_artikel'];
$nama_artikel = $_POST['nama_artikel'];
$isi_artikel = $_POST['isi_artikel'];
$gambar_artikel = $_FILES['gambar_artikel']['name'];
//cek dulu jika merubah gambar produk jalankan coding ini
if ($gambar_artikel != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar_artikel); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar_artikel']['tmp_name'];
    $angka_acak = rand(1, 999);
    $nama_gambar_baru = $angka_acak . '-' . $gambar_artikel; //menggabungkan angka acak dengan nama file sebenarnya
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, 'gambar/' . $nama_gambar_baru); //memindah file gambar ke folder gambar

        // jalankan query UPDATE berdasarkan ID yang produknya kita edit
        $query = "UPDATE artikel SET nama_artikel = '$nama_artikel', isi_artikel = '$isi_artikel', gambar_artikel = '$nama_gambar_baru' WHERE id_artikel = '$id_artikel'";
        $result = mysqli_query($link, $query);
        // periska query apakah ada error
        if (!$result) {
            die("Query gagal dijalankan: " . mysqli_errno($link) .
                " - " . mysqli_error($link));
        } else {
            //tampil alert dan akan redirect ke halaman index.php
            //silahkan ganti index.php sesuai halaman yang akan dituju
            echo "<script>alert('Data berhasil diubah.');window.location='artikel.php';</script>";
        }
    } else {
        //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambahArtikel.php';</script>";
    }
} else {
    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
    $query = "UPDATE artikel SET nama_artikel = '$nama_artikel', isi_artikel = '$isi_artikel' WHERE id_artikel = '$id_artikel'";
    $result = mysqli_query($link, $query);
    // periska query apakah ada error
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($link) .
            " - " . mysqli_error($link));
    } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('Data berhasil diubah.');window.location='artikel.php';</script>";
    }
}