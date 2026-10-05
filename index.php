<!DOCTYPE html>

<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Blood Sync - Unified Blood Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

body{
font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
background:#f4f6f9;
}

/* NAVBAR */

.navbar{
background:linear-gradient(90deg,#b30000,#ff4d4d);
box-shadow:0 2px 10px rgba(0,0,0,0.2);
}

.navbar-brand{
font-size:24px;
font-weight:bold;
}

/* HERO SECTION */

.hero{
background:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)),
url("https://images.unsplash.com/photo-1581595219315-a187dd40c322");
background-size:cover;
background-position:center;
color:white;
padding:120px 20px;
text-align:center;
}

.hero h1{
font-size:48px;
font-weight:bold;
}

.hero p{
font-size:18px;
margin-top:15px;
}

/* BUTTON STYLE */

.btn-main{
background:#ff4d4d;
color:white;
border:none;
padding:12px 25px;
}

.btn-main:hover{
background:#cc0000;
}

/* FEATURE CARDS */

.feature-card{
border:none;
border-radius:12px;
box-shadow:0 4px 20px rgba(0,0,0,0.1);
transition:0.3s;
}

.feature-card:hover{
transform:translateY(-8px);
}

/* ICONS */

.icon{
font-size:40px;
color:#dc3545;
}

/* STATS */

.stats{
background:white;
padding:40px 0;
}

.stat-box{
text-align:center;
}

.stat-box h2{
color:#dc3545;
font-weight:bold;
}

/* FOOTER */

.footer{
background:#222;
color:white;
padding:20px;
text-align:center;
margin-top:40px;
}

</style>

</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-dark">
<div class="container">

<a class="navbar-brand" href="#">
<i class="fa-solid fa-droplet"></i> Blood Sync
</a>

<div>

<a href="donor_register.php" class="btn btn-light me-2">
<i class="fa-solid fa-user-plus"></i> Donor Register
</a>

<a href="hospital_register.php" class="btn btn-light me-2">
<i class="fa-solid fa-hospital"></i> Hospital Register
</a>

<a href="login.php" class="btn btn-light me-2">
<i class="fa-solid fa-right-to-bracket"></i> Login
</a>

<a href="search_blood.php" class="btn btn-warning me-2">
<i class="fa-solid fa-magnifying-glass"></i> Search Blood
</a>

<!-- EMERGENCY BUTTON ADDED -->

<a href="emergency_request.php" class="btn btn-danger">
<i class="fa-solid fa-triangle-exclamation"></i> Emergency
</a>

</div>

</div>
</nav>

<!-- HERO SECTION -->

<section class="hero">

<h1>Donate Blood, Save Lives</h1>

<p>
Blood Sync connects donors, hospitals and blood banks to ensure blood is available
when it is needed the most.
</p>

<br>

<a href="donor_register.php" class="btn btn-main btn-lg me-3">
Become a Donor
</a>

<a href="search_blood.php" class="btn btn-light btn-lg">
Find Blood
</a>

</section>

<!-- FEATURES -->

<div class="container mt-5">

<h2 class="text-center text-danger mb-5">Our Services</h2>

<div class="row text-center">

<div class="col-md-4 mb-4">

<div class="card feature-card p-4">

<div class="icon mb-3">
<i class="fa-solid fa-hand-holding-droplet"></i>
</div>

<h5>Blood Donation</h5>

<p>
Register as a donor and help patients in need by donating blood.
</p>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="card feature-card p-4">

<div class="icon mb-3">
<i class="fa-solid fa-hospital"></i>
</div>

<h5>Hospital Requests</h5>

<p>
Hospitals can quickly send blood requests during emergencies.
</p>

</div>

</div>

<div class="col-md-4 mb-4">

<div class="card feature-card p-4">

<div class="icon mb-3">
<i class="fa-solid fa-magnifying-glass"></i>
</div>

<h5>Search Blood</h5>

<p>
Check real-time blood availability by selecting blood group.
</p>

</div>

</div>

</div>

</div>

<!-- STATS -->

<section class="stats">

<div class="container">

<div class="row">

<div class="col-md-4 stat-box">

<h2>500+</h2>

<p>Registered Donors</p>

</div>

<div class="col-md-4 stat-box">

<h2>60+</h2>

<p>Hospitals Connected</p>

</div>

<div class="col-md-4 stat-box">

<h2>1200+</h2>

<p>Lives Saved</p>

</div>

</div>

</div>

</section>

<!-- FOOTER -->

<div class="footer">

<p>© 2026 Blood Sync | Unified Blood Management System</p>

</div>

</body>
</html>