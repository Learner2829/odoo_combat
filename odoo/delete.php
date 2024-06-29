<?php
session_start();
require_once("connect.php");
if(isset($_SESSION["log"])){
    $cid=$_REQUEST["g_id"];
$query="DELETE FROM `grievance_information` WHERE g_id=".$cid;
echo $query;
$result=mysqli_query($conn,$query);
if($result){
    header("Location:admin.php");
}
else
{
    echo mysqli_error($conn);
}

}


?>