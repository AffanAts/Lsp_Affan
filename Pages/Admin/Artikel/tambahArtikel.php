<?php
include('../../../database/config.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>

<head>
    <title>JeWePe Article</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
</head>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 ">Tambah Artikel</p>
                                    <form class="mx-1 mx-md-4" method="POST" action="proses_tambah.php"
                                        enctype="multipart/form-data">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-heading fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="nama_artikel" id="form3Example4c" autofocus=""
                                                    required="" class="form-control" />
                                                <label class="form-label" for="form3Example4c">Judul Artikel</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-align-justify fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <textarea type="text" name="isi_artikel" id="textAreaExample" rows="4"
                                                    class=" form-control"></textarea>
                                                <label class="form-label" for="form3Example4cd">Isi Artikel</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-image fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="file" class="form-control" id="customFile"
                                                    name="gambar_artikel" required=""></input>
                                                <label class="form-label" for="customFile"></label>
                                            </div>
                                        </div>
                                        <div class="form-group ms-4 ps-3">
                                            <input type="submit" class="btn btn-primary" value="Submit">
                                            <a class="btn btn-link" href="artikel.php">Cancel</a>
                                        </div>
                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <img src="../../../Images/memory.svg" class="img-fluid w-75 ms-5"
                                        alt="Sample image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>

</html>