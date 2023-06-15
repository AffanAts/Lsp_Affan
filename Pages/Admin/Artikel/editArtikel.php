<?php
  // memanggil file koneksi.php untuk membuat koneksi
include '../../../database/config.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id_artikel'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id_artikel = ($_GET["id_artikel"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM artikel WHERE id_artikel='$id_artikel'";
    $result = mysqli_query($link, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='artikel.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='artikel.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD Produk dengan gambar - Gilacoding</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: salmon;
      }
    button {
          background-color: salmon;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: salmon;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
  </head>
  <body>
      <center>
        <h1>Edit Produk <?php echo $data['nama_artikel']; ?></h1>
      <center>
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id_artikel" value="<?php echo $data['id_artikel']; ?>"  hidden />
        <div>
          <label>Nama Produk</label>
          <input type="text" name="nama_artikel" value="<?php echo $data['nama_artikel']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Deskripsi</label>
         <input type="text" name="isi artikel" value="<?php echo $data['isi_artikel']; ?>" />
        </div>
        <div>
          <label>Gambar Produk</label>
          <img src="gambar/<?php echo $data['gambar_artikel']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="gambar_artikel" />
          <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
        </div>
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>