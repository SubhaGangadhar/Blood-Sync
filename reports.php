<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['admin']))
{
header("Location: ../login.php");
exit();
}
?>

<!DOCTYPE html>
<html>

<head>

<title>System Reports</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

<style>

body{
background:#f5f5f5;
}

.card{
border:none;
border-radius:10px;
box-shadow:0px 4px 12px rgba(0,0,0,0.1);
transition:0.3s;
}

.card:hover{
transform:scale(1.05);
}

.report-icon{
font-size:35px;
margin-bottom:10px;
}

</style>

</head>

<body>

<div class="container mt-5">

<h2 class="text-center text-danger mb-4">
<i class="fa-solid fa-chart-bar"></i> System Reports
</h2>

<div class="row g-4">

<!-- Donor Report -->

<div class="col-md-3">
<a href="donor_report.php" style="text-decoration:none;">
<div class="card text-center bg-primary text-white p-4">

<i class="fa-solid fa-users report-icon"></i>

<h5>Donor Report</h5>

</div>
</a>
</div>

<!-- Hospital Report -->

<div class="col-md-3">
<a href="hospital_report.php" style="text-decoration:none;">
<div class="card text-center bg-success text-white p-4">

<i class="fa-solid fa-hospital report-icon"></i>

<h5>Hospital Report</h5>

</div>
</a>
</div>

<!-- Blood Stock Report -->

<div class="col-md-3">
<a href="blood_stock_report.php" style="text-decoration:none;">
<div class="card text-center bg-warning text-dark p-4">

<i class="fa-solid fa-droplet report-icon"></i>

<h5>Blood Stock Report</h5>

</div>
</a>
</div>

<!-- Blood Request Report -->

<div class="col-md-3">
<a href="request_report.php" style="text-decoration:none;">
<div class="card text-center bg-danger text-white p-4">

<i class="fa-solid fa-file-medical report-icon"></i>

<h5>Blood Request Report</h5>

</div>
</a>
</div>

</div>

<br><br>

<div class="text-center">

<a href="dashboard.php" class="btn btn-dark btn-lg">
<i class="fa-solid fa-arrow-left"></i> Back to Dashboard
</a>

</div>

</div>

</body>

</html>