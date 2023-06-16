<?php
include('../../database/config.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta nama="viewport" content="width=device-width, initial-scale=1.0" />
  <title>JeWePe Article</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="style/search.css">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column min-vh-100">
  <?php include '../../component/header.php'; ?>
  <main>

    <div class="input-group container w-25">
      <div class="form-outline">
        <input type="search" id="form1" class="form-control" />
        <label class="form-label" for="form1">Search</label>
      </div>
      <button type="button" class="btn btn-primary">
        <i class="fas fa-search"></i>
      </button>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-5 mx-4">
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM artikel ORDER BY id_artikel ASC";
      $result = mysqli_query($link, $query);
      //mengecek apakah ada error ketika menjalankan query
      if (!$result) {
        die("Query Error: " . mysqli_errno($link) .
          " - " . mysqli_error($link));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col">
          <div class="card h-100">
            <img class="rounded mx-auto d-block img-fluid" style="width: 600px; height:300px"
              src="../admin/Artikel/gambar/<?php echo $row['gambar_artikel']; ?>">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">
                <?php echo $row['nama_artikel']; ?>
              </h5>
              <p class="card-text">
                <?php echo substr($row['isi_artikel'], 0, 500); ?> .....
              </p>
              <a href="#!" class="btn btn-primary mt-auto w-25">Lihat Artikel</a>
            </div>
          </div>
        </div>
        <?php
      }
      ?>
    </div>
  </main>
  <?php include '../../component/footer.php'; ?>
</body>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>

</html>