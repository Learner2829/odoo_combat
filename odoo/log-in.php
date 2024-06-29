<?php
session_start();
require_once("connect.php");

$errors = []; // Array to store validation errors

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['position'])) {
        $errors[] = "All fields are required!";
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $position = mysqli_real_escape_string($conn, $_POST['position']);

        // Determine the table based on the position
        $table = $position == "Employee" ? "employ" : "HR";

        // Query to check if the user exists
        $sql = "SELECT * FROM `$table` WHERE `Name`='$username'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            // Verify the password
            if (password_verify($password, $user['Password'])) {
                // Password is correct, login successful
                // You can start a session and redirect the user to a different page here
                $_SESSION["log"]="log-in";
                if($position=="Employee"){
                    $_SESSION["e_name"]=$username;
                    header("Location:e_dashbord.php");
                }
                else
                {
                    $_SESSION["h_name"]=$username;
                    header("Location:h_dashbord.php");
                }

            } else {
                // Password is incorrect
                $errors[] = "Invalid username or password!";
            }
        } else {
            // User not found
            $errors[] = "Invalid username or password!";
        }
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
        <div class="mb-3">
            <label for="position" class="form-label">Position</label>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="position" required>
                <option value="" selected disabled>Select Your Occupation</option>
                <option value="Employee">Employee</option>
                <option value="HR">Human Resources(HR)</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="index.php" class="btn-link">Back to Home</a>
    </form>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
