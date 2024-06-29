<?php
session_start();
require_once("connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if($username=="Admin"&&$password=="Admin123"){
        $_SESSION["log2"]="log-in";
        header("Location:admin.php");
    }
    else
    {
        echo "Your Email or Password is wrong";
    }



}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: skyblue url('p/dimg.jpg') no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%; /* Full width */
            max-width: 600px; /* Max width for the container */
        }
        h2 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-label {
            color: white;
        }
        .btn-primary {
            background-color: #4CAF50; /* Green */
            border: none;
        }
        .btn-primary:hover {
            background-color: #45a049;
        }
        .btn-link {
            display: inline-block;
            background-color: black;
            color: white;
            text-decoration: none;
            text-align: center;
            border-radius: 4px;
            margin-top: 10px;
            padding: 10px 20px; /* Adjusted padding for better look */
        }
        .btn-link:hover {
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Login</h2>

    <?php 
    if (!empty($errors)) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
        foreach ($errors as $error) {
            echo '<p>' . htmlspecialchars($error) . '</p>';
        }
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }
    ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>  
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="index.php" class="btn-link">Back to Home</a>
    </form>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>