<?php
include_once("boot.php");
include_once("connect.php");
$errors = []; // Array to store validation errors

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['position'])) {
        $errors[] = "All fields are required!";
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $position = mysqli_real_escape_string($conn, $_POST['position']);

        // Validate position
        if (!in_array($position, ['Employee', 'HR'])) {
            $errors[] = "Invalid position selected!";
        }

        // Check if username or email already exists
        $table = $position == "Employee" ? "employ" : "HR";
        $sql_check = "SELECT * FROM `$table` WHERE `Name`='$username' OR `Email`='$email'";
        $result_check = mysqli_query($conn, $sql_check);

        if ($result_check === false) {
            $errors[] = "Error checking existing records: " . mysqli_error($conn);
        } elseif (mysqli_num_rows($result_check) > 0) {
            $errors[] = "Username or email already exists!";
        } else {
            // Insert new user record with hashed password
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);
            $sql_insert = "INSERT INTO `$table` (`Name`, `Email`, `Password`) VALUES ('$username', '$email', '$password_hashed')";
            $result_insert = mysqli_query($conn, $sql_insert);

            if ($result_insert === false) {
                $errors[] = "Error inserting new record: " . mysqli_error($conn);
            } else {
                echo '<div class="alert alert-success" role="alert">Your account was created successfully!</div>';
                // exit; // Stop further execution after success
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign-Up</title>
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
      margin: 0;
      font-family: 'Source Sans Pro', sans-serif;
    }
    .container {
      background-color: rgba(0, 0, 0, 0.5);
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      max-width: 500px;
      width: 100%;
      margin: 20px;
    }
    h2 {
      color: white;
      text-align: center;
      margin-bottom: 20px;
    }
    .form-label {
      color: white;
    }
    .btn-primary, .btn-secondary, .btn-link {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
    }
    .btn-primary {
      background-color: #4CAF50;
      border: none;
    }
    .btn-primary:hover {
      background-color: #45a049;
    }
    .btn-secondary {
      margin-top: 10px;
    }
    .btn-link {
      display: inline-block;
      background-color: black;
      color: white;
      text-decoration: none;
      text-align: center;
      border-radius: 4px;
      margin-top: 10px;
      padding: 10px 20px;
    }
    .btn-link:hover {
      background-color: #333;
      color: white;
    }
    .alert {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Sign Up</h2>

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
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>

    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="position" required>
    <option value="" selected disabled>Select Your Occupation</option>
    <option value="Employee">Employee</option>
    <option value="HR">Human Resources(HR)</option>
    </select>

    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="index.php" class="btn-link">Back to Home</a>
  </form>
</div>

<!-- Bootstrap JS and dependencies (e.g., Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
