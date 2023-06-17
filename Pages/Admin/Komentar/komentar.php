<?php
include('../../../database/config.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: ../login.php");
  exit;
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>JeWePe Article</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column min-vh-100">
  <header class="d-flex flex-wrap justify-content-center py-3 mb-4 bg-light">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
      <img src="../../../Images/JWP.png" alt="sss" class="ms-5" style="width: 90px" />
    </a>
    <!-- Example single danger button -->
    <div class="btn-group h-50 mt-1 ">
      <button type="button" class="btn btn-primary dropdown-toggle fs-6" data-bs-toggle="dropdown"
        aria-expanded="false">
        Admin
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="../resetPassword.php">Reset Password</a></li>
      </ul>
    </div>
    <ul class="nav nav-pills me-5 fs-5">
      <li class="nav-item me-3">
        <a href="../../../Pages/Admin/index.php" class="nav-link" aria-current="page">Dashboard</a>
      </li>
      <li class="nav-item">
        <a href="../artikel/artikel.php" class="nav-link ">Article</a>
      </li>
      <li class="nav-item">
        <a href="../../Pages/Admin/komentar/komentar.php" class="nav-link ">Komentar</a>
      </li>
    </ul>
  </header>
  <main class="container w-100">
    <center>
      <h1>Data Komentar</h1>
    </center>
    <br />
    <br />
    <table id="example" class="table table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Judul Artikel</th>
          <th>Nama Komentar</th>
          <th>Email</th>
          <th>Isi Komentar</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
        $query = "SELECT komentar.*, artikel.nama_artikel 
          FROM komentar INNER JOIN artikel ON komentar.id_artikel = artikel.id_artikel";
        
        $result = mysqli_query($link, $query);
        //mengecek apakah ada error ketika menjalankan query
        if (!$result) {
          die("Query Error: " . mysqli_errno($link) .
            " - " . mysqli_error($link));
        }

        //buat perulangan untuk element tabel dari data mahasiswa
        $no = 1; //variabel untuk membuat nomor urut
        // hasil query akan disimpan dalam variabel $data dalam bentuk array
        // kemudian dicetak dengan perulangan while
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td>
              <?php echo $no; ?>
            </td>
            <td>
              <?php echo $row['nama_artikel']; ?>
            </td>
            <td>
              <?php echo $row['nama']; ?>
            </td>
            <td>
              <?php echo $row['email']; ?>
            </td>
            <td>
              <?php echo substr($row['komentar'], 0, 500); ?> .....
            </td>
            <td>
              <a href="proses_hapusK.php?id_komentar=<?php echo $row['id_komentar']; ?>"
                onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="far fa-trash-can"></i></a>
            </td>
          </tr>

          <?php
          $no++; //untuk nomor urut terus bertambah 1
        }
        ?>
      </tbody>
    </table>
    <script>
      $(document).ready(function () {
        $('#example').DataTable({
          lengthMenu: [
            [5, 8, 10, -1],
            [5, 8, 10, 'All'],
          ],
        });
      });
    </script>
  </main>
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top mt-auto">
    <div class="col-md-4 d-flex align-items-center">
      <a href="#" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
        <img src="../../../Images/JWP.png" alt="sss" class="ms-5" style="width: 40px" />
      </a>
      <span class="mb-3 mb-md-0 text-body-secondary">© 2023 JeWePe, Inc</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3">
        <a class="text-body-secondary" href="#"></a>
      </li>
      <li class="ms-3">
        <a class="text-body-secondary" href="#"></a>
      </li>
      <li class="ms-3">
        <a class="text-body-secondary" href="#"></a>
      </li>
    </ul>
  </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>