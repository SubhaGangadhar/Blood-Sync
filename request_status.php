<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['hospital']))
{
    header("Location: ../login.php");
    exit();
}

$email = $_SESSION['hospital'];

/* Get hospital details */
$hospital_query = mysqli_query($conn,"SELECT hospital_name FROM hospital WHERE email='$email'");

if(!$hospital_query){
    die("Hospital Query Error: ".mysqli_error($conn));
}

$hospital = mysqli_fetch_assoc($hospital_query);

$hospital_name = $hospital['hospital_name'];

/* Fetch blood requests (FIXED) */
$result = mysqli_query($conn,"SELECT * FROM blood_request WHERE hospital_name='$hospital_name'");

if(!$result){
    die("Request Query Error: ".mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Blood Request Status - Blood Sync</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

<style>

body{
min-height:100vh;
background-image:url("https://images.unsplash.com/photo-1581594693702-fbdc51b2763b");
background-size:cover;
background-position:center;
font-family:'Segoe UI',sans-serif;
}

body::before{
content:"";
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.7);
z-index:-1;
}

.status-card{
max-width:1200px;
margin:auto;
margin-top:60px;
background:rgba(255,255,255,0.18);
backdrop-filter:blur(14px);
border-radius:20px;
box-shadow:0 15px 40px rgba(0,0,0,0.4);
padding:35px;
color:white;
}

.page-title{
font-weight:700;
text-align:center;
margin-bottom:25px;
}

.table{
background:white;
border-radius:12px;
overflow:hidden;
}

.table th{
background:linear-gradient(135deg,#dc3545,#ff6b6b);
color:white;
text-align:center;
}

.table td{
text-align:center;
vertical-align:middle;
}

.badge{
padding:8px 14px;
border-radius:20px;
}

.btn-back{
background:#212529;
color:white;
padding:10px 22px;
border-radius:10px;
}

</style>

</head>

<body>

<div class="container">

<div class="status-card">

<h2 class="page-title">
<i class="fa-solid fa-file-medical"></i> Blood Request Status
</h2>

<div class="table-responsive">

<table class="table table-bordered">

<thead>
<tr>
<th>Patient Name</th>
<th>Blood Group</th>
<th>Units</th>
<th>Emergency Level</th>
<th>Status</th>
</tr>
</thead>

<tbody>

<?php

if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
        $status = $row['status'];

        if($status=="Approved")
            $badge="<span class='badge bg-success'>Approved</span>";
        elseif($status=="Rejected")
            $badge="<span class='badge bg-danger'>Rejected</span>";
        else
            $badge="<span class='badge bg-warning text-dark'>Pending</span>";
?>

<tr>
<td><?php echo $row['patient_name']; ?></td>
<td><?php echo $row['blood_group']; ?></td>
<td><?php echo $row['units_required']; ?></td>
<td><?php echo $row['emergency_level']; ?></td>
<td><?php echo $badge; ?></td>
</tr>

<?php
    }
}
else
{
?>

<tr>
<td colspan="5">No Requests Found</td>
</tr>

<?php } ?>

</tbody>

</table>

</div>

<div class="text-center mt-4">

<a href="hospital_dashboard.php" class="btn btn-back">
<i class="fa-solid fa-arrow-left"></i> Back to Dashboard
</a>

</div>

</div>

</div>

</body>

</html>