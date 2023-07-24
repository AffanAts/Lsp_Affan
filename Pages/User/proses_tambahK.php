<?php
// memanggil file koneksi.php untuk membuat koneksi
include '../../database/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $id_artikel = $_POST["id_artikel"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $komentar = $_POST["komentar"];
    
    // Set the default timezone to Jakarta
    date_default_timezone_set('Asia/Jakarta');
    
    // Get the current date and time in Jakarta timezone
    $tanggal_komentar = date('Y-m-d H:i:s');

    // Insert the comment data into the database
    $query = "INSERT INTO komentar (id_artikel, nama, email, komentar, tanggal_komentar) VALUES ('$id_artikel', '$nama', '$email', '$komentar', '$tanggal_komentar')";
    
    $result = mysqli_query($link, $query);

    if ($result) {
        // Comment added successfully
        // Redirect back to the article page with the added comment
        header("Location: article.php?id_artikel=$id_artikel");
        exit();
    } else {
        // Error occurred while adding comment
        echo "Error: " . mysqli_error($link);
    }
}
?>
