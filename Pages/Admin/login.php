<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}

// ../../component/headerAdmin.php
// Include config file
require_once "../../database/config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM admin_login WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: index.php");
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>JeWePe Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="style/style.css" />
</head>

<body>
    <div>
        <section class="mb-5 pb-5 mt-5">
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-9 col-lg-6 col-xl-5 mt-5">
                        <img src="../../Images/Login.svg" class="img-fluid ms-5" alt="Sample image"
                            style="width: 450px">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1" style="margin-top:160px">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-outline mb-4" <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>>
                                <input type="text" name="username" id="form3Example3"
                                    class="form-control form-control-lg" placeholder="Enter a valid username"
                                    value="<?php echo $username; ?>" />
                                <label class="form-label" for="form3Example3">Username</label>
                                <span class="help-block">
                                    <?php echo $username_err; ?>
                                </span>
                            </div>
                            <div class="form-outline mb-3">
                                <input type="password" name="password" id="form3Example4"
                                    class="form-control form-control-lg" placeholder="Enter password" />
                                <span class="help-block">
                                    <?php echo $password_err; ?>
                                </span>
                                <label class="form-label" for="form3Example4">Password</label>
                            </div>
                            <div class="text-center text-lg-start mt-4 pt-2">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-lg w-25" value="Login">
                                    <p>Belum punya akun? <a href="register.php">Sign up now</a>.</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php include '../../component/footer.php'; ?>
    </div>
</body>

</html>