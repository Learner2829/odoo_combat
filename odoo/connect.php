<?php
require_once "boot.php";

// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "odoo_com2");

// Check if the connection failed
if (!$conn) {
    // Log the error to a file
    error_log("Database connection failed: " . mysqli_connect_error());

    // Display a user-friendly error message
    echo '<div class="alert alert-danger" role="alert">';
    echo 'Could not connect to the database. Please try again later.';
    echo '</div>';

    // Terminate the script to prevent further execution
    exit();
}

// Continue with the rest of your code if the connection is successful
?>
