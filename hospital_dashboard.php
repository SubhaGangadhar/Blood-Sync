<?php
session_start();

if(!isset($_SESSION['hospital']))
{
header("Location: ../login.php");
exit();
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Hospital Dashboard - Blood Sync</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

<style>

body{
height:100vh;
background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),
url("https://images.unsplash.com/photo-1586773860418-d37222d8fce3");
background-size:cover;
background-position:center;
font-family:'Segoe UI',sans-serif;
}

/* Navbar */

.navbar{
background:rgba(0,0,0,0.6);
backdrop-filter:blur(8px);
}

.navbar-brand{
font-weight:bold;
color:#fff;
font-size:22px;
}

/* Dashboard Title */

.dashboard-title{
text-align:center;
color:white;
margin-top:40px;
margin-bottom:50px;
font-weight:700;
}

/* Glass Cards */

.dashboard-card{
background:rgba(255,255,255,0.15);
backdrop-filter:blur(12px);
border-radius:15px;
padding:35px;
color:white;
text-align:center;
transition:0.3s;
box-shadow:0 8px 20px rgba(0,0,0,0.3);
}

.dashboard-card:hover{
transform:translateY(-8px);
box-shadow:0 12px 30px rgba(0,0,0,0.4);
}

.icon{
font-size:45px;
margin-bottom:12px;
}

/* Card Colors */

.request{
border-left:6px solid #ff4d4d;
}

.status{
border-left:6px solid #4da6ff;
}

.logout{
border-left:6px solid #aaaaaa;
}

a{
text-decoration:none;
}

</style>

</head>

<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg">
<div class="container">

<span class="navbar-brand">
<i class="fa-solid fa-droplet"></i> Blood Sync System
</span>

<a href="../logout.php" class="btn btn-danger btn-sm">
Logout
</a>

</div>
</nav>

<div class="container">

<h2 class="dashboard-title">
<i class="fa-solid fa-hospital"></i> Hospital Dashboard
</h2>

<div class="row justify-content-center g-4">

<!-- Request Blood -->

<div class="col-md-4">

<a href="request_blood.php">

<div class="dashboard-card request">

<i class="fa-solid fa-droplet icon"></i>

<h4>Request Blood</h4>

<p>Send emergency blood request</p>

</div>

</a>

</div>

<!-- Request Status -->

<div class="col-md-4">

<a href="request_status.php">

<div class="dashboard-card status">

<i class="fa-solid fa-file-medical icon"></i>

<h4>Request Status</h4>

<p>Check approval & delivery</p>

</div>

</a>

</div>

<!-- Logout -->

<div class="col-md-4">

<a href="../logout.php">

<div class="dashboard-card logout">

<i class="fa-solid fa-right-from-bracket icon"></i>

<h4>Logout</h4>

<p>Exit from system</p>

</div>

</a>

</div>

</div>

</div>

</body>

</html>