<?php
include("config/db.php");
?>

<!DOCTYPE html>
<html>

<head>

<title>Search Blood Availability</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

<style>

body{
min-height:100vh;
background-image:url("https://images.unsplash.com/photo-1579154204601-01588f351e67");
background-size:cover;
background-position:center;
background-repeat:no-repeat;
font-family:'Segoe UI',sans-serif;
}

/* Dark overlay */

body::before{
content:"";
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.65);
z-index:-1;
}

/* Title */

.page-title{
text-align:center;
color:white;
font-weight:700;
margin-bottom:30px;
}

/* Search Card */

.search-card{
max-width:700px;
margin:auto;
border-radius:20px;
background:rgba(255,255,255,0.18);
backdrop-filter:blur(12px);
box-shadow:0 15px 40px rgba(0,0,0,0.4);
padding:30px;
color:white;
}

/* Results Card */

.result-card{
max-width:1000px;
margin:auto;
margin-top:30px;
background:white;
border-radius:15px;
box-shadow:0 10px 25px rgba(0,0,0,0.3);
overflow:hidden;
}

/* Table */

.table th{
background:#dc3545;
color:white;
text-align:center;
}

.table td{
text-align:center;
}

/* Button */

.btn-search{
border-radius:10px;
padding:10px 20px;
font-weight:500;
transition:0.3s;
}

.btn-search:hover{
transform:translateY(-2px);
box-shadow:0 6px 20px rgba(0,0,0,0.3);
}

</style>

</head>

<body>

<div class="container mt-5">

<h2 class="page-title">
<i class="fa-solid fa-droplet"></i> Search Blood Availability
</h2>

<!-- SEARCH FORM -->

<div class="search-card">

<form method="POST">

<div class="row g-3 align-items-center">

<div class="col-md-8">

<select name="blood_group" class="form-select" required>

<option value="">Select Blood Group</option>
<option>A+</option>
<option>A-</option>
<option>B+</option>
<option>B-</option>
<option>O+</option>
<option>O-</option>
<option>AB+</option>
<option>AB-</option>

</select>

</div>

<div class="col-md-4">

<button type="submit" class="btn btn-danger w-100 btn-search">
<i class="fa-solid fa-magnifying-glass"></i> Search
</button>

</div>

</div>

</form>

</div>

<br>

<?php

if(isset($_POST['blood_group']))
{

$blood_group = $_POST['blood_group'];

$query = mysqli_query($conn,"SELECT * FROM blood_stock WHERE blood_group='$blood_group'");

?>

<div class="result-card">

<div class="card-header bg-danger text-white text-center">

<h5 class="mb-0">Search Results for <?php echo $blood_group; ?></h5>

</div>

<div class="card-body">

<table class="table table-bordered table-striped">

<tr>
<th>ID</th>
<th>Blood Group</th>
<th>Units</th>
<th>Donation Date</th>
<th>Expiry Date</th>
<th>Status</th>
</tr>

<?php

while($row=mysqli_fetch_assoc($query))
{

if($row['units'] > 5)
{
$status = "<span class='badge bg-success'>Available</span>";
}
elseif($row['units'] > 0)
{
$status = "<span class='badge bg-warning text-dark'>Low Stock</span>";
}
else
{
$status = "<span class='badge bg-danger'>Out of Stock</span>";
}

?>

<tr>

<td><?php echo $row['stock_id']; ?></td>
<td><?php echo $row['blood_group']; ?></td>
<td><?php echo $row['units']; ?></td>
<td><?php echo $row['donation_date']; ?></td>
<td><?php echo $row['expiry_date']; ?></td>
<td><?php echo $status; ?></td>

</tr>

<?php
}
?>

</table>

</div>

</div>

<?php
}
?>

<br>

<div class="text-center">

<a href="index.php" class="btn btn-dark btn-search">
<i class="fa-solid fa-arrow-left"></i> Back to Home
</a>

</div>

</div>

</body>

</html>