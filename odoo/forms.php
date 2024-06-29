<?php
session_start();

// Include connection file (assuming it's named connect.php)
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $error = false; // Flag to track validation errors

  $employeeName = "";
  $jobTitle = "";
  $homeAddress = "";
  $workAddress = "";
  $eventDetails = "";
  $witnesses = "";
  $accountOfEvent = "";
  $violations = "";
  $proposedSolution = "";

  // **Validation**
  if (empty($_POST["employeeName"])) {
    $error = true;
    echo "<p style='color: red;'>Please enter your employee name.</p>";
  } else {
    $employeeName = mysqli_real_escape_string($conn, $_POST["employeeName"]);
  }

  if (empty($_POST["jobTitle"])) {
    $error = true;
    echo "<p style='color: red;'>Please enter your job title.</p>";
  } else {
    $jobTitle = mysqli_real_escape_string($conn, $_POST["jobTitle"]);
  }

  // Basic address validation (check for empty string)
  if (empty($_POST["homeAddress"])) {
    $error = true;
    echo "<p style='color: red;'>Please enter your home address.</p>";
  } else {
    $homeAddress = mysqli_real_escape_string($conn, $_POST["homeAddress"]);
  }

  if (empty($_POST["workAddress"])) {
    $error = true;
    echo "<p style='color: red;'>Please enter your work address.</p>";
  } else {
    $workAddress = mysqli_real_escape_string($conn, $_POST["workAddress"]);
  }

  if (empty($_POST["eventDetails"])) {
    $error = true;
    echo "<p style='color: red;'>Please enter details about the event.</p>";
  } else {
    $eventDetails = mysqli_real_escape_string($conn, $_POST["eventDetails"]);
  }

  // Optional fields (no validation required)
  $witnesses = mysqli_real_escape_string($conn, $_POST["witnesses"]);
  $accountOfEvent = mysqli_real_escape_string($conn, $_POST["accountOfEvent"]);
  $violations = mysqli_real_escape_string($conn, $_POST["violations"]);
  $proposedSolution = mysqli_real_escape_string($conn, $_POST["proposedSolution"]);

  // Insert data if no validation errors
  if (!$error) {
    $sql = "INSERT INTO `grievance_information` (
              `employeeName`, 
              `jobTitle`, 
              `homeAddress`, 
              `workAddress`, 
              `eventDetails`, 
              `witnesses`, 
              `accountOfEvent`, 
              `violations`, 
              `proposedSolution`,
              `created_at`
            ) 
          VALUES (
              '$employeeName', 
              '$jobTitle', 
              '$homeAddress', 
              '$workAddress', 
              '$eventDetails', 
              '$witnesses', 
              '$accountOfEvent', 
              '$violations', 
              '$proposedSolution',
              NOW()
          )";

    if (mysqli_query($conn, $sql)) {
      echo "<h3>Grievance Submitted Successfully!</h3>";
      header("Location:e_dashbord.php");
    } else {
      echo "Error: " . mysqli_error($conn);
    }
  }

  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grievance Information</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-section {
            background-color: #343a40; /* Dark background color */
            color: white; /* White text color */
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .form-section h4 {
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .form-label {
            color: white; /* White text color for labels */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <form method="POST" action="">
        <div class="form-section">
            <h4>GRIEVANT INFORMATION</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="employeeName" class="form-label">EMPLOYEE NAME</label>
                    <input type="text" class="form-control" id="employeeName" name="employeeName" placeholder="Enter employee name">
                </div>
                <div class="col-md-6">
                    <label for="jobTitle" class="form-label">JOB TITLE</label>
                    <input type="text" class="form-control" id="jobTitle" name="jobTitle" placeholder="Enter job title">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="homeAddress" class="form-label">EMPLOYEE HOME MAILING ADDRESS</label>
                    <textarea class="form-control" id="homeAddress" name="homeAddress" rows="3" placeholder="Enter home mailing address"></textarea>
                </div>
                <div class="col-md-6">
                    <label for="workAddress" class="form-label">WORKPLACE MAILING ADDRESS</label>
                    <textarea class="form-control" id="workAddress" name="workAddress" rows="3" placeholder="Enter workplace mailing address"></textarea>
                </div>
            </div>
        </div>

        <div class="form-section">
            <h4>DETAILS OF EVENT LEADING TO GRIEVANCE</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="eventDetails" class="form-label">LOCATION OF EVENT</label>
                    <input type="text" class="form-control" id="eventDetails" name="eventDetails" placeholder="Enter details">
                </div>
                <div class="col-md-6">
                    <label for="witnesses" class="form-label">WITNESSES <span class="text-muted">(if applicable)</span></label>
                    <input type="text" class="form-control" id="witnesses" name="witnesses" placeholder="Enter witness names">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="accountOfEvent" class="form-label">ACCOUNT OF EVENT</label>
                    <textarea class="form-control" id="accountOfEvent" name="accountOfEvent" rows="5" placeholder="Provide a detailed account of the occurrence. Include the names of any additional persons involved."></textarea>
                </div>
                <div class="col-md-6">
                    <label for="violations" class="form-label">VIOLATIONS</label>
                    <textarea class="form-control" id="violations" name="violations" rows="5" placeholder="Provide a list of any policies, procedures, or guidelines you believe have been violated in the event described."></textarea>
                </div>
            </div>
        </div>

        <div class="form-section">
            <h4>PROPOSED SOLUTION</h4>
            <div class="card-body">
                <textarea class="form-control" id="proposedSolution" name="proposedSolution" rows="5" placeholder="The solution proposed here is in collaboration with the consulted HR and Admin."></textarea>
                <p class="card-text">Please retain a copy of this form for your own records. As the grievant, please provide your signature below, as it indicates that the information you've included on this form is truthful.</p>
            </div>
        </div>

        <div class="form-section">
            <h4>SIGNATURES</h4>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="employeeSignature" class="form-label">EMPLOYEE SIGNATURE</label>
                    <!-- Add signature input here if needed -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="receivedBy" class="form-label">RECEIVED BY: PRINTED NAME AND SIGNATURE</label>
                    <!-- Add signature input here if needed -->
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
