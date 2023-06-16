<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include config file
require_once "../../database/config.php";

// mengambil data barang
$data_artikel = mysqli_query($link, "SELECT * FROM artikel");
$data_komentar = mysqli_query($link, "SELECT * FROM komentar");

// menghitung data barang
$jumlah_artikel = mysqli_num_rows($data_artikel);
$jumlah_komentar = mysqli_num_rows($data_komentar);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style type="text/css">
        body {
            font: 14px sans-serif;
            text-align: center;
        }
    </style>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body class="d-flex flex-column min-vh-100">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 bg-light">
        <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <img src="../../Images/JWP.png" alt="sss" class="ms-5" style="width: 90px" />
        </a>
        <!-- Example single danger button -->
        <div class="btn-group h-50 mt-1 ">
            <button type="button" class="btn btn-primary dropdown-toggle fs-6" data-bs-toggle="dropdown"
                aria-expanded="false">
                Admin
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="resetPassword.php">Reset Password</a></li>
            </ul>
        </div>
        <ul class="nav nav-pills me-5 fs-5">
            <li class="nav-item me-3">
                <a href="../../Pages/Admin/index.php" class="nav-link" aria-current="page">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="../../Pages/Admin/artikel/artikel.php" class="nav-link ">Article</a>
            </li>
            <li class="nav-item">
                <a href="../../Pages/Admin/komentar/komentar.php" class="nav-link ">Komentar</a>
            </li>
        </ul>
    </header>
    <main>
        <div class="container py-4">
            <div class="p-5 mb-4 bg-body-tertiary rounded-3">
                <div class="container-fluid py-5">
                    <h1 class="display-4 fw-bold">
                        <h1>Hai, <b>
                                <?php echo htmlspecialchars($_SESSION["username"]); ?>
                            </b></h1>
                    </h1>
                    <p class="col-md-9 fs-4">Selamat datang di dashboard website admin. Semoga Anda merasa nyaman dan
                        mendapatkan pengalaman yang menyenangkan dalam mengelola website ini. Kami siap membantu Anda
                        dalam setiap langkah perjalanan Anda di sini.</p>
                    <!-- <button class="btn btn-primary btn-lg" type="button">Report Table</button> -->
                </div>
            </div>
            <div class="row align-items-md-stretch">
                <div class="col-md-6">
                    <center>
                        <div class="h-100 p-5 text-bg-dark rounded-3">
                            <h2>Total Artikel</h2>
                            <p>
                                <?php echo $jumlah_artikel; ?>
                            </p>
                            <a href="artikel/artikel.php"><button class="btn btn-primary btn-lg"
                                    type="button">Artikel</button></a>
                        </div>
                    </center>
                </div>
                <div class="col-md-6">
                    <center>
                        <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                            <h2>Total Komentar</h2>
                            <p>
                                <?php echo $jumlah_komentar; ?>
                            </p>
                            <a href="komentar/komentar.php"><button class="btn btn-primary btn-lg"
                                    type="button">Komentar</button></a>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </main>
    <?php include '../../component/footer.php'; ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</html>