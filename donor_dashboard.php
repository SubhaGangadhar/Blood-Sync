<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['donor']))
{
header("Location: ../login.php");
exit();
}

$donor_id = $_SESSION['donor_id'];

/* Get last donation date */

$query = mysqli_query($conn,"
SELECT MAX(donation_date) as last_donation 
FROM donation_history 
WHERE donor_id='$donor_id'
");

/* Check query */

if(!$query){
die("Query Error : ".mysqli_error($conn));
}

$data = mysqli_fetch_assoc($query);

$last_date = $data['last_donation'];

$eligibility_message = "";
$last_donation_display = "";

/* Donor Eligibility Logic */

if($last_date != NULL)
{

$last_donation_display = "
<div class='alert alert-secondary text-center'>
Last Donation Date : <b>$last_date</b>
</div>";

$last = strtotime($last_date);
$today = strtotime(date("Y-m-d"));

$diff = floor(($today - $last) / (60*60*24));

if($diff < 90)
{

$remaining = 90 - $diff;

$eligibility_message = "
<div class='alert alert-danger text-center'>
<i class='fa-solid fa-circle-exclamation'></i>
You are not eligible to donate yet.<br>
You can donate again after <b>$remaining days</b>.
</div>";

}
else
{

$eligibility_message = "
<div class='alert alert-success text-center'>
<i class='fa-solid fa-heart'></i>
You are eligible to donate blood.
</div>";

}

}
else
{

$eligibility_message = "
<div class='alert alert-info text-center'>
<i class='fa-solid fa-info-circle'></i>
You have not donated blood yet. You are eligible to donate.
</div>";

}

/* 🔔 GET NOTIFICATION COUNT */

$count_query = mysqli_query($conn, "
SELECT COUNT(*) as total 
FROM notifications 
WHERE user_id='$donor_id' 
AND user_type='donor' 
AND status='unread'
");

$count_data = mysqli_fetch_assoc($count_query);
$notification_count = $count_data['total'];

?>

<!DOCTYPE html>
<html>

<head>

<title>Donor Dashboard</title>

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

/* Dashboard Card */

.dashboard-card{
max-width:1000px;
margin:auto;
margin-top:70px;
background:rgba(255,255,255,0.18);
backdrop-filter:blur(14px);
border-radius:20px;
box-shadow:0 15px 40px rgba(0,0,0,0.4);
padding:40px;
color:white;
}

/* Title */

.dashboard-title{
font-weight:700;
letter-spacing:1px;
text-align:center;
margin-bottom:20px;
}

/* Buttons */

.dashboard-btn{
border:none;
padding:20px;
font-weight:600;
border-radius:14px;
transition:0.3s;
font-size:16px;
position:relative;
}

.dashboard-btn i{
font-size:22px;
margin-bottom:6px;
display:block;
}

/* Hover animation */

.dashboard-btn:hover{
transform:translateY(-5px);
box-shadow:0 10px 25px rgba(0,0,0,0.4);
}

/* Button colors */

.btn-profile{
background:linear-gradient(135deg,#007bff,#339af0);
color:white;
}

.btn-update{
background:linear-gradient(135deg,#ffc107,#ffca2c);
color:black;
}

.btn-history{
background:linear-gradient(135deg,#28a745,#48c774);
color:white;
}

.btn-notification{
background:linear-gradient(135deg,#dc3545,#ff6b6b);
color:white;
}

.btn-logout{
background:linear-gradient(135deg,#343a40,#495057);
color:white;
}

/* Notification badge */

.badge-notify{
position:absolute;
top:8px;
right:12px;
background:red;
color:white;
border-radius:50%;
padding:5px 8px;
font-size:12px;
}

</style>

</head>

<body>

<div class="container">

<div class="dashboard-card">

<h2 class="dashboard-title">
<i class="fa-solid fa-user-heart"></i> Donor Dashboard
</h2>

<?php echo $last_donation_display; ?>
<?php echo $eligibility_message; ?>

<div class="row text-center mt-4 g-4">

<div class="col-md-3">
<a href="view_profile.php" class="btn dashboard-btn btn-profile w-100">
<i class="fa-solid fa-user"></i>
View Profile
</a>
</div>

<div class="col-md-3">
<a href="update_profile.php" class="btn dashboard-btn btn-update w-100">
<i class="fa-solid fa-pen"></i>
Update Profile
</a>
</div>

<div class="col-md-3">
<a href="donation_history.php" class="btn dashboard-btn btn-history w-100">
<i class="fa-solid fa-droplet"></i>
Donation History
</a>
</div>

<!-- 🔔 NEW NOTIFICATION BUTTON -->

<div class="col-md-3">
<a href="notifications.php" class="btn dashboard-btn btn-notification w-100">
<i class="fa-solid fa-bell"></i>
Notifications

<?php if($notification_count > 0){ ?>
<span class="badge-notify"><?php echo $notification_count; ?></span>
<?php } ?>

</a>
</div>

<div class="col-md-3">
<a href="../logout.php" class="btn dashboard-btn btn-logout w-100">
<i class="fa-solid fa-right-from-bracket"></i>
Logout
</a>
</div>

</div>

</div>

</div>

</body>

</html>