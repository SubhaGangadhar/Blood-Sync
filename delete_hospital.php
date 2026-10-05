<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit();
}

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM hospital WHERE hospital_id='$id'");

header("Location: manage_hospital.php");
?>