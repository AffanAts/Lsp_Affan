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
                    <button class="btn btn-primary btn-lg" type="button">Laporan Website</button>
                </div>
            </div>

            <div class="row align-items-md-stretch">
                <div class="col-md-6">
                    <div class="h-100 p-5 text-bg-dark rounded-3">
                        <h2>Total Artikel</h2>
                        <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron
                            look. Then, mix and match with additional component themes and more.</p>
                        <button class="btn btn-outline-light" type="button">Example button</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="h-100 p-5 bg-body-tertiary border rounded-3">
                        <h2>Add borders</h2>
                        <p>Or, keep it light and add a border for some added definition to the boundaries of your
                            content. Be sure to look under the hood at the source HTML here as we've adjusted the
                            alignment and sizing of both column's content for equal-height.</p>
                        <button class="btn btn-outline-secondary" type="button">Example button</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</html>