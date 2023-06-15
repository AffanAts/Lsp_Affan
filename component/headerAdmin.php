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
    <meta nama="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
</head>

<body>
    <?php
    // session_start();
    ?>
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 bg-light">
        <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <img src="../../Images/JWP.png" alt="sss" class="ms-5" style="width: 90px" />
        </a>
        <!-- Example single danger button -->
        <div class="btn-group h-50 mt-3 ">
            <button type="button" class="btn btn-primary dropdown-toggle fs-4" data-bs-toggle="dropdown"
                aria-expanded="false">
                Admin  
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../Pages/Admin/logout.php">Logout</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Separated link</a></li>
            </ul>
        </div>
        <ul class="nav nav-pills me-5 fs-3">
            <li class="nav-item me-3">
                <a href="../../Pages/Admin/index.php" class="nav-link" aria-current="page">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="../../Pages/Admin/index.php" class="nav-link ">Article</a>
            </li>
        </ul>
    </header>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>

</html>