<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['admin']))
{
header("Location: ../login.php");
exit();
}

$id = $_GET['id'];

mysqli_query($conn,"UPDATE hospital SET status='approved' WHERE hospital_id='$id'");

header("Location: manage_hospital.php");

?>