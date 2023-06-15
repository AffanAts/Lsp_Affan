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
  <title>CRUD Produk dengan gambar - Gilacoding</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</head>

<body>
  <center>
    <h1>Data Produk</h1>
    <center>
      <center><a href="tambahArtikel.php">+ &nbsp; Tambah Produk</a>
        <center>
          <br />
          <table>
            <thead>
              <tr>
                <th>No</th>
                <th>Artikel</th>
                <th>Isi Artikel</th>
                <th>Gambar</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
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
                    <?php echo substr($row['isi_artikel'], 0, 20); ?>
                  </td>
                  <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar_artikel']; ?>"
                      style="width: 120px;"></td>
                  <td>
                    <a href="editArtikel.php?id_artikel=<?php echo $row['id_artikel']; ?>">Edit</a> |
                    <a href="proses_hapus.php?id_artikel=<?php echo $row['id_artikel']; ?>"
                      onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
                  </td>
                </tr>

                <?php
                $no++; //untuk nomor urut terus bertambah 1
              }
              ?>
            </tbody>
          </table>
</body>

</html>