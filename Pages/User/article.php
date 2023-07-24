<?php
// memanggil file koneksi.php untuk membuat koneksi
include '../../database/config.php';

// mengecek apakah di url ada nilai GET id
if (isset($_GET['id_artikel'])) {
  // ambil nilai id dari url dan disimpan dalam variabel $id
  $id_artikel = ($_GET["id_artikel"]);

  // menampilkan data dari database yang mempunyai id=$id
  $query = "SELECT artikel.*, komentar.nama, komentar.komentar, komentar.email, komentar.tanggal_komentar, artikel.komentar_aktif 
        FROM artikel
        LEFT JOIN komentar ON artikel.id_artikel = komentar.id_artikel
        WHERE artikel.id_artikel = $id_artikel";

  $result = mysqli_query($link, $query);
  // jika data gagal diambil maka akan tampil error berikut
  if (!$result) {
    die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
  }
  // mengambil data dari database
  $data = null; // inisialisasi $data dengan null
  if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
  }
  // apabila data tidak ada pada database maka akan dijalankan perintah ini
  if (!$data) {
    echo "<script>alert('Data tidak ditemukan pada database');window.location='listarticle.php';</script>";
  }
} else {
  // apabila tidak ada data GET id pada akan di redirect ke index.php
  echo "<script>alert('Masukkan data id.');window.location='listarticle.php';</script>";
}

// Check if comments are active for the article
$comments_active = $data['komentar_aktif'];

// Fetch comments for the article
$query_comments = "SELECT * FROM komentar WHERE id_artikel = $id_artikel AND status_hide = 0";
$result_comments = mysqli_query($link, $query_comments);
?>

<!DOCTYPE html>
<html>

<head>
  <title>JeWePe Article</title>
  <link rel="icon" href="../../Images/JWP.png">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
  <link href="../style/artikel.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column min-vh-100">
  <header>
    <?php include '../../component/header.php'; ?>
  </header>
  <!-- Page content-->
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-8">
        <!-- Post content-->
        <article>
          <!-- Post header-->
          <header class="mb-4">
            <!-- Post title-->
            <h1 class="fw-bolder mb-1">
              <?php echo $data['nama_artikel']; ?>
            </h1>
            <!-- Post meta content-->
            <div class="text-muted fst-italic mb-2">Posted on
              <?php echo date('F j, Y h:i A', strtotime($data['tanggal_komentar'])); ?> by Affan Haidar
            </div>
            <!-- Post categories-->
            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
          </header>
          <!-- Preview image figure-->
          <figure class="mb-4">
            <img class="rounded mx-auto d-block img-fluid" style="width: 600px; height:300px"
              src="../admin/Artikel/gambar/<?php echo $data['gambar_artikel']; ?>">
          </figure>
          <!-- Post content-->
          <section class="mb-5">
            <p class="fs-5 mb-4">
              <?php echo $data['isi_artikel']; ?>
            </p>
          </section>
        </article>
        <!-- Comments section-->
        <section class="mb-5">
          <?php if ($comments_active) { ?>
            <div class="card bg-light">
              <div class="card-body">
                <!-- Comment form (Keep it same) -->
                <form class="mx-1 mx-md-4" method="POST" action="proses_tambahK.php" enctype="multipart/form-data">
                  <input type="hidden" name="id_artikel" value="<?php echo $id_artikel; ?>">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-signature fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="nama" id="form3Example4c" autofocus="" required=""
                        class="form-control" />
                      <label class="form-label" for="form3Example4c">Nama</label>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-at fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="email" id="form3Example4c" autofocus="" required=""
                        class="form-control" />
                      <label class="form-label" for="form3Example4c">Email</label>
                    </div>
                  </div>
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-comment fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <textarea type="text" name="komentar" id="textAreaExample" rows="4"
                        class="form-control"></textarea>
                      <label class="form-label" for="form3Example4cd">Komentar</label>
                    </div>
                  </div>

                  <div class="form-group ms-4 ps-3 mb-5">
                    <input type="submit" class="btn btn-primary" value="Submit">
                  </div>
                </form>

                <!-- Existing comments -->
                <?php
                if ($result_comments) {
                  if (mysqli_num_rows($result_comments) > 0) {
                    // Loop through each comment data
                    while ($comment = mysqli_fetch_assoc($result_comments)) {
                      ?>
                      <div class="row d-flex justify-content-center">
                        <div class="card mb-4 w-100">
                          <div class="card-body">
                            <p>
                              <?php echo $comment['komentar']; ?>
                            </p>

                            <div class="d-flex justify-content-between">
                              <div class="d-flex flex-row align-items-center">
                                <img class="rounded-circle"
                                  src="https://loremflickr.com/320/240?random=<?php echo rand(); ?>" alt="..."
                                  style="width:50px;height:50px" />
                                <p class="small mb-0 ms-2">
                                  <?php echo $comment['nama']; ?>
                                </p>
                              </div>
                              <div class="d-flex flex-row align-items-center">
                                <p class="small text-muted mb-0">Posted on
                                  <?php echo date('F j, Y h:i A', strtotime($comment['tanggal_komentar'])); ?>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php
                    }
                  } else {
                    echo '<div class="fw-bold">No comments found.</div>';
                  }
                } else {
                  echo '<div class="fw-bold">Failed to fetch comments.</div>';
                }
                ?>
              </div>
            </div>
          <?php } else { ?>
            <div class="alert alert-warning" role="alert">
              Comments are currently disabled for this article.
            </div>
          <?php } ?>
        </section>
      </div>
      <!-- Side widgets-->
      <div class="col-lg-4">
        <!-- Search widget-->
        <div class="card mb-4">
          <div class="card-header">Search</div>
          <div class="card-body">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Enter search term..."
                aria-label="Enter search term..." aria-describedby="button-search" />
              <button class="btn btn-primary" id="button-search" type="button">Go!</button>
            </div>
          </div>
        </div>
        <!-- Categories widget-->
        <div class="card mb-4">
          <div class="card-header">Categories</div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                  <li><a href="#!">Modern Tech</a></li>
                  <li><a href="#!">Economic</a></li>
                  <li><a href="#!">President</a></li>
                </ul>
              </div>
              <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                  <li><a href="#!">Cars</a></li>
                  <li><a href="#!">University</a></li>
                  <li><a href="#!">Tutorials</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- Side widget-->
        <div class="card mb-4">
          <div class="card-header">JeWePe Group</div>
          <div class="card-body">JeWePe Artikel adalah website artikel yang menyajikan beragam informasi menarik,
            inspiratif, dan terkini. Dengan tampilan yang modern dan intuitif, kami menghadirkan konten-konten yang
            dikurasi secara khusus untuk memenuhi kebutuhan pembaca dari segala kalangan.</div>
        </div>
      </div>
    </div>
  </div>
  <footer>
    <?php include '../../component/footer.php'; ?>
  </footer>
</body>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>

</html>
