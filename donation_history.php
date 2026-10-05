<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['donor']))
{
header("Location: ../login.php");
exit();
}

$email = $_SESSION['donor'];

/* Get donor info */

$query = mysqli_query($conn,"SELECT * FROM donor WHERE email='$email'");
$donor = mysqli_fetch_assoc($query);

$donor_id = $donor['donor_id'];

/* Get donation history */

$history = mysqli_query($conn,"
SELECT donation_date 
FROM donation_history 
WHERE donor_id='$donor_id'
ORDER BY donation_date DESC
");

?>

<!DOCTYPE html>
<html>

<head>

<title>Donation History</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

<style>

body{
min-height:100vh;
background-image:url("https://images.unsplash.com/photo-1612277795421-9bc7706a4a34");
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
background:rgba(0,0,0,0.60);
z-index:-1;
}

/* History Card */

.history-card{
max-width:900px;
margin:auto;
margin-top:70px;
background:rgba(255,255,255,0.20);
backdrop-filter:blur(12px);
border-radius:20px;
box-shadow:0 15px 40px rgba(0,0,0,0.4);
padding:40px;
color:white;
}

/* Title */

.history-title{
text-align:center;
font-weight:700;
margin-bottom:25px;
font-size:30px;
}

/* Table */

.table{
background:white;
border-radius:10px;
overflow:hidden;
}

.table th{
background:#dc3545;
color:white;
}

.table td{
color:#333;
}

/* Button */

.btn-custom{
border-radius:10px;
padding:10px 22px;
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

<div class="history-card">

<h2 class="history-title">
<i class="fa-solid fa-droplet"></i> Donation History
</h2>

<table class="table table-bordered text-center">

<tr>
<th>Name</th>
<th>Blood Group</th>
<th>Donation Date</th>
</tr>

<?php

if(mysqli_num_rows($history) > 0)
{

while($row = mysqli_fetch_assoc($history))
{

?>

<tr>

<td><?php echo $donor['name']; ?></td>

<td><?php echo $donor['blood_group']; ?></td>

<td><?php echo $row['donation_date']; ?></td>

</tr>

<?php

}

}

else
{

?>

<tr>
<td colspan="3">No Donation History Found</td>
</tr>

<?php

}

?>

</table>

<div class="text-center mt-4">

<a href="donor_dashboard.php" class="btn btn-dark btn-custom">

<i class="fa-solid fa-arrow-left"></i> Back to Dashboard

</a>

</div>

</div>

</div>

</body>

</html>