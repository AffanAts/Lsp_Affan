<?php
include('../../database/config.php'); // agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

// Menerima dan memproses input search
if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // Jalankan query untuk menampilkan data yang sesuai dengan input search
    $query = "SELECT * FROM artikel WHERE nama_artikel LIKE '%$search%' ORDER BY id_artikel ASC";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }
} else {
    // Jika input search tidak ada, jalankan query untuk menampilkan semua data
    $query = "SELECT * FROM artikel ORDER BY id_artikel ASC";
    $result = mysqli_query($link, $query);

    if (!$result) {
        die("Query Error: " . mysqli_errno($link) . " - " . mysqli_error($link));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

    <div class="container mt-5">
      <form method="GET" action="" class="input-group">
        <input type="search" id="form1" class="form-control" name="search" placeholder="Search" />
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-search"></i>
        </button>
      </form>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-5 mx-4">
      <?php
      // buat perulangan untuk element tabel dari data artikel
      // hasil query akan disimpan dalam variabel $row dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
        <div class="col">
          <div class="card h-100">
          <a href="article.php?id_artikel=<?php echo $row['id_artikel']; ?>"><img class="rounded mx-auto d-block img-fluid" style=  "width: 600px; height:300px" src="../admin/Artikel/gambar/<?php echo $row['gambar_artikel']; ?>"></a>
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">
                <?php echo $row['nama_artikel']; ?>
              </h5>
              <p class="card-text">
                <?php echo substr($row['isi_artikel'], 0, 500); ?> .....
              </p>
              <a href="article.php?id_artikel=<?php echo $row['id_artikel']; ?>" class="btn btn-primary mt-auto w-25">Lihat Artikel</a>
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
