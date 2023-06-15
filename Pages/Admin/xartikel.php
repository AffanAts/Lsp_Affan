<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</head>

<body>
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
                <a href="../../Pages/Admin/index.php" class="nav-link ">Article</a>
            </li>
        </ul>
    </header>
    <main class="container">
        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th>Artikel</th>
                    <th>Isi</th>
                    <th>Gambar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../../database/config.php";
                $artikels = mysqli_query($link, "select * from artikel");
                while ($row = mysqli_fetch_array($artikels)) {
                    echo "<tr>
            <td>" . $row['nama_artikel'] . "</td>
            <td>" . $row['isi_artikel'] . "</td>
            <td>" . $row['gambar_artikel'] . "</td>
            
        </tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
    <!-- <?php include '../../component/footer.php'; ?> -->
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</html>