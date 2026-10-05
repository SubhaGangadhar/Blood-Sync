<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Blood Stock Management - Blood Sync</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

<style>

/* Background */

body{
min-height:100vh;
background-image:url("https://images.unsplash.com/photo-1581594693702-fbdc51b2763b");
background-size:cover;
background-position:center;
background-repeat:no-repeat;
font-family:'Segoe UI',sans-serif;
}

/* Dark Overlay */

body::before{
content:"";
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.75);
z-index:-1;
}

/* Title */

.page-title{
font-weight:700;
text-align:center;
color:white;
margin-bottom:30px;
}

/* Glass Card */

.form-card,.table-card{
background:rgba(255,255,255,0.15);
backdrop-filter:blur(12px);
border-radius:15px;
padding:30px;
color:white;
box-shadow:0 10px 30px rgba(0,0,0,0.4);
margin-bottom:30px;
}

/* Table */

.table{
background:white;
border-radius:10px;
overflow:hidden;
}

.table th{
background:linear-gradient(135deg,#dc3545,#ff6b6b);
color:white;
text-align:center;
}

.table td{
vertical-align:middle;
}

/* Buttons */

.btn-add{
background:linear-gradient(135deg,#28a745,#4cd964);
border:none;
color:white;
font-weight:600;
border-radius:8px;
}

.btn-add:hover{
transform:translateY(-2px);
box-shadow:0 6px 20px rgba(0,0,0,0.3);
}

.btn-delete{
background:linear-gradient(135deg,#dc3545,#ff6b6b);
border:none;
color:white;
}

.btn-delete:hover{
transform:translateY(-2px);
box-shadow:0 6px 20px rgba(0,0,0,0.3);
}

.btn-back{
background:#212529;
color:white;
padding:10px 25px;
border-radius:8px;
font-weight:600;
}

.btn-back:hover{
background:#343a40;
transform:translateY(-2px);
}

label{
font-weight:600;
}

</style>

</head>

<body>

<div class="container mt-5">

<h2 class="page-title">
<i class="fa-solid fa-droplet"></i> Blood Stock Management
</h2>

<!-- Add Blood Form -->

<div class="form-card">

<form action="blood_stock_process.php" method="POST">

<div class="row g-3">

<div class="col-md-3">
<label>Blood Group</label>
<select name="blood_group" class="form-control">
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

<div class="col-md-2">
<label>Units</label>
<input type="number" name="units" class="form-control" required>
</div>

<div class="col-md-3">
<label>Donation Date</label>
<input type="date" name="donation_date" class="form-control" required>
</div>

<div class="col-md-3">
<label>Expiry Date</label>
<input type="date" name="expiry_date" class="form-control" required>
</div>

<div class="col-md-1 d-flex align-items-end">
<button type="submit" class="btn btn-add w-100">
<i class="fa-solid fa-plus"></i>
</button>
</div>

</div>

</form>

</div>

<!-- Blood Stock Table -->

<div class="table-card">

<h4 class="mb-3"><i class="fa-solid fa-warehouse"></i> Available Blood Stock</h4>

<table class="table table-bordered table-striped">

<thead>

<tr>
<th>ID</th>
<th>Blood Group</th>
<th>Units</th>
<th>Donation Date</th>
<th>Expiry Date</th>
<th>Status</th>
<th>Action</th>
</tr>

</thead>

<tbody>

<?php
$result = mysqli_query($conn,"SELECT * FROM blood_stock");

while($row = mysqli_fetch_assoc($result)) {

$units = $row['units'];

if($units > 10)
$status = "<span class='badge bg-success'>Available</span>";
elseif($units > 0)
$status = "<span class='badge bg-warning text-dark'>Low Stock</span>";
else
$status = "<span class='badge bg-danger'>Out of Stock</span>";
?>

<tr>

<td class="text-center"><?php echo $row['stock_id']; ?></td>

<td><?php echo $row['blood_group']; ?></td>

<td class="text-center"><?php echo $row['units']; ?></td>

<td><?php echo $row['donation_date']; ?></td>

<td><?php echo $row['expiry_date']; ?></td>

<td class="text-center"><?php echo $status; ?></td>

<td class="text-center">

<a href="delete_blood.php?id=<?php echo $row['stock_id']; ?>" 
class="btn btn-delete btn-sm"
onclick="return confirm('Are you sure you want to delete this record?');">
<i class="fa-solid fa-trash"></i> Delete
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

<div class="text-center">

<a href="dashboard.php" class="btn btn-back">
<i class="fa-solid fa-arrow-left"></i> Back to Dashboard
</a>

</div>

</div>

</body>
</html>