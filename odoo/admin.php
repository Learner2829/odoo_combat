<?php
session_start();
require_once("boot.php");
require_once("connect.php");
if(isset($_SESSION["log2"])){
    echo'<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <button type="button" class="btn btn-link"><a href="session_ex.php">Log-Out</a></button>
    </div>
  </div>
</nav>';
    
$query='SELECT * FROM `grievance_information` WHERE 1';
$result=mysqli_query($conn,$query);
echo '<table border=1 class="table table-striped">  <thead>
<tr>
  <th>Date</th>
  <th>Employee Name</th>
  <th>Job Title</th>
  <th>Grievance Description</th>
  <th>Status</th>
  <th>Resolution</th>
  <th>Delete</th>
</tr>
</thead>
<tbody>';
while($record=mysqli_fetch_assoc($result)){
    echo '<tr>
    <td> '.$record["created_at"].'</td>
    <td> '.$record["employeeName"].'</td>
    <td> '.$record["jobTitle"].'</td>
    <td> '.$record["eventDetails"].'</td>
    <td> '.$record["stutas"].'</td>
    <td> '.$record["proposedSolution"].'</td>
    <td><a href="delete.php?g_id='.$record["g_id"].'">Delete</a></td>
    </tr>';
}
// print_r($record);
// print_r($result);
}
else{
    header("Location:session_ex.php");
}

?>