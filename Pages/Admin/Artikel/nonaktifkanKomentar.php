<?php
// Include the database connection file
include('../../../database/config.php');

// Check if the article ID is provided via GET request
if (isset($_GET['id_artikel'])) {
    $article_id = $_GET['id_artikel'];

    // Update the 'komentar_aktif' column in the 'artikel' table to 0 (inactive) for the specified article
    $query = "UPDATE artikel SET komentar_aktif = 0 WHERE id_artikel = $article_id";
    $result = mysqli_query($link, $query);

    if ($result) {
        // Redirect back to the artikel.php page with a success message
        header("Location: artikel.php?status=success&message=Comments for the article have been deactivated.");
        exit();
    } else {
        // Redirect back to the artikel.php page with an error message
        header("Location: artikel.php?status=error&message=Failed to deactivate comments for the article.");
        exit();
    }
} else {
    // Redirect back to the artikel.php page if article ID is not provided
    header("Location: artikel.php");
    exit();
}
?>
