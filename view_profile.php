<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['donor']))
{
header("Location: ../login.php");
exit();
}

$email = $_SESSION['donor'];

/* Get donor details */

$query = mysqli_query($conn,"SELECT * FROM donor WHERE email='$email'");

if(!$query){
die("Query Error: ".mysqli_error($conn));
}

$data = mysqli_fetch_assoc($query);

$donor_id = $data['id'];

/* Get last donation date from donation_history */

$donation_query = mysqli_query($conn,"
SELECT MAX(donation_date) AS last_donation 
FROM donation_history 
WHERE donor_id='$donor_id'
");

$donation_data = mysqli_fetch_assoc($donation_query);

$last_donation = $donation_data['last_donation'];

if(!$last_donation){
$last_donation = "No Donation Yet";
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Donor Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

<style>

body{
min-height:100vh;
background-image:url("https://images.unsplash.com/photo-1615461066841-6116e61058f4");
background-size:cover;
background-position:center;
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

/* Profile Card */

.profile-card{
max-width:800px;
margin:auto;
margin-top:70px;
background:rgba(255,255,255,0.18);
backdrop-filter:blur(14px);
border-radius:20px;
box-shadow:0 15px 40px rgba(0,0,0,0.4);
padding:35px;
color:white;
}

/* Title */

.profile-title{
font-weight:700;
text-align:center;
margin-bottom:20px;
}

/* Profile Icon */

.profile-icon{
font-size:70px;
color:white;
text-align:center;
margin-bottom:20px;
}

/* Table */

.table{
background:white;
border-radius:12px;
overflow:hidden;
}

.table th{
background:#dc3545;
color:white;
width:35%;
}

.table td{
color:#333;
}

/* Buttons */

.btn-custom{
border-radius:10px;
padding:10px 20px;
font-weight:500;
transition:0.3s;
}

.btn-custom:hover{
transform:translateY(-2px);
box-shadow:0 6px 20px rgba(0,0,0,0.3);
}

</style>

</head>

<body>

<div class="container">

<div class="profile-card">

<h2 class="profile-title">
<i class="fa-solid fa-user"></i> My Profile
</h2>

<div class="profile-icon">
<i class="fa-solid fa-user-circle"></i>
</div>

<table class="table table-bordered">

<tr>
<th>Name</th>
<td><?php echo $data['name']; ?></td>
</tr>

<tr>
<th>Age</th>
<td><?php echo $data['age']; ?></td>
</tr>

<tr>
<th>Gender</th>
<td><?php echo $data['gender']; ?></td>
</tr>

<tr>
<th>Blood Group</th>
<td><?php echo $data['blood_group']; ?></td>
</tr>

<tr>
<th>Phone</th>
<td><?php echo $data['phone']; ?></td>
</tr>

<tr>
<th>Email</th>
<td><?php echo $data['email']; ?></td>
</tr>

<tr>
<th>Address</th>
<td><?php echo $data['address']; ?></td>
</tr>

<tr>
<th>Last Donation</th>
<td><?php echo $last_donation; ?></td>
</tr>

</table>

<div class="text-center mt-4">

<a href="update_profile.php" class="btn btn-primary btn-custom me-2">
<i class="fa-solid fa-pen"></i> Edit Profile
</a>

<a href="donor_dashboard.php" class="btn btn-dark btn-custom">
<i class="fa-solid fa-arrow-left"></i> Back
</a>

</div>

</div>

</div>

</body>

</html>