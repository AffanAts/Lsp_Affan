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
  if (!$result) {
    die("Query Error: " . mysqli_errno($link) .
      " - " . mysqli_error($link));
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
  <title>JeWePe Article</title>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
</head>

<body>
  <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 ">Edit Artikel</p>
                  <form class="mx-1 mx-md-4" method="POST" action="proses_edit.php" enctype="multipart/form-data">
                    <input name="id_artikel" value="<?php echo $data['id_artikel']; ?>" hidden />
                    <!-- JUDUL ARTIKEL -->
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-heading fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" name="nama_artikel" id="form3Example4c" autofocus="" required=""
                          class="form-control" value="<?php echo $data['nama_artikel']; ?>">
                        </input>
                        <label class="form-label" for="form3Example4c">Judul Artikel</label>
                      </div>
                    </div>
                    <!-- ISI ARTIKEL -->
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-align-justify fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <textarea type="text" name="isi_artikel" id="textAreaExample" rows="4"
                          class=" form-control"><?php echo $data['isi_artikel']; ?></textarea>
                        <label class="form-label" for="form3Example4cd">Isi Artikel</label>
                      </div>
                    </div>
                    <!-- GAMBAR ARTIKEL -->
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-image fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="file" class="form-control" id="customFile" name="gambar_artikel"
                          value="<?php echo $data['gambar_artikel']; ?>"></input>
                        <label class="form-label" for="customFile"></label><img
                          src="gambar/<?php echo $data['gambar_artikel']; ?>"
                          style="width: 120px;float: left;margin-bottom: 5px;">
                      </div>
                    </div>
                    <div class="form-group ms-4 ps-3">
                      <input type="submit" class="btn btn-primary" value="Submit">
                      <a class="btn btn-link" href="artikel.php">Cancel</a>
                    </div>
                  </form>

                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                  <img src="../../../Images/update.svg" class="img-fluid w-75 ms-5" alt="Sample image">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>

</html>