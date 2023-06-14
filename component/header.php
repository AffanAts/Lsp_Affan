<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
</head>

<body>
    <?php
    session_start();
    ?>
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 bg-light">
        <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <img src="../Images/JWP.png" alt="sss" class="ms-5" style="width: 90px" />
        </a>

        <ul class="nav nav-pills me-5">
            <li class="nav-item me-3">
                <a href="../Pages/Home.php" class="nav-link " aria-current="page">Home</a>
            </li>
            <li class="nav-item">
                <a href="../Pages/listArticle.php" class="nav-link ">Article</a>
            </li>
            <li class="nav-item">
                <a href="../Pages/login.php" class="nav-link ">Login</a>
            </li>
        </ul>
    </header>
</body>

</html>