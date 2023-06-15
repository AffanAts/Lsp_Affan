<?php
// Include config file
require_once "../../database/config.php";

// Define variables and initialize with empty values
$nama = $email = $komentar = "";
$nama_err = $email_err = $komentar_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_nama = trim($_POST["nama"]);
    if(empty($input_nama)){
        $nama_err = "Please enter a nama.";
    } elseif(!filter_var($input_nama, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $nama_err = "Please enter a valid name.";
    } else{
        $nama = $input_nama;
    }

    // Validate address
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter an address.";
    } else{
        $email = $input_email;
    }

    // Validate salary
    $input_komentar = trim($_POST["komentar"]);
    if(empty($input_komentar)){
        $komentar_err = "Please enter the salary amount.";
    } elseif(!ctype_digit($input_komentar)){
        $komentar_err = "Please enter a positive integer value.";
    } else{
        $komentar = $input_komentar;
    }

    // Check input errors before inserting in database
    if(empty($nama_err) && empty($email_err) && empty($komentar_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO komentar (nama, email, komentar) VALUES (?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_nama, $param_email, $param_komentar);

            // Set parameters
            $param_nama = $nama;
            $param_email = $email;
            $param_komentar = $komentar;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Tambah Record</h2>
                    </div>
                    <p>Silahkan isi form di bawah ini kemudian submit untuk menambahkan data pegawai ke dalam database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($nama_err)) ? 'has-error' : ''; ?>">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $nama; ?>">
                            <span class="help-block"><?php echo $nama_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <textarea name="email" class="form-control"><?php echo $email; ?></textarea>
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($Komentar_err)) ? 'has-error' : ''; ?>">
                            <label>Komentar</label>
                            <input type="text" name="komentar" class="form-control" value="<?php echo $komentar; ?>">
                            <span class="help-block"><?php echo $komentar_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>