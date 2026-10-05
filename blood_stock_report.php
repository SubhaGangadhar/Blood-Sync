<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['admin']))
{
header("Location: ../login.php");
exit();
}

$result = mysqli_query($conn,"SELECT * FROM blood_stock");
?>

<!DOCTYPE html>
<html>

<head>

<title>Blood Stock Report</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#f4f6f9;
}

.report-title{
text-align:center;
color:#dc3545;
font-weight:bold;
margin-bottom:30px;
}

.table th{
background:#dc3545;
color:white;
text-align:center;
}

.table td{
text-align:center;
}

</style>

</head>

<body>

<div class="container mt-5">

<h2 class="report-title">Blood Stock Report</h2>

<div class="card shadow">

<div class="card-body">

<table class="table table-bordered table-striped">

<thead>

<tr>
<th>ID</th>
<th>Blood Group</th>
<th>Units</th>
<th>Donation Date</th>
<th>Expiry Date</th>
</tr>

</thead>

<tbody>

<?php
while($row=mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?php echo $row['stock_id']; ?></td>
<td><?php echo $row['blood_group']; ?></td>
<td><?php echo $row['units']; ?></td>
<td><?php echo $row['donation_date']; ?></td>
<td><?php echo $row['expiry_date']; ?></td>

</tr>

<?php
}
?>

</tbody>

</table>

</div>

</div>

<br>

<div class="text-center">

<button onclick="window.print()" class="btn btn-success">
Print Report
</button>

<a href="reports.php" class="btn btn-dark">
Back to Reports
</a>

</div>

</div>

</body>

</html>