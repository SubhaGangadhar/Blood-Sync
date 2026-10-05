<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['admin'])){
header("Location: ../login.php");
exit();
}

/* DATA */
$total_donors = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM donor"))['total'];
$total_hospitals = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM hospital"))['total'];
$total_blood = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(units) as total FROM blood_stock"))['total'];
$total_requests = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM blood_request WHERE LOWER(status)='pending'"))['total'];
$emergency_count = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM blood_request WHERE emergency_level='Urgent' AND LOWER(status)='pending'"))['total'];
?>

<!DOCTYPE html>
<html>
<head>

<title>Admin Dashboard | Blood Sync</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>

/* ===== BODY ===== */
body{
    margin:0;
    font-family:'Segoe UI',sans-serif;
    background:#f5f7fa;
}

/* ===== NAVBAR ===== */
.navbar{
    background:#0f172a;
    padding:12px 40px;
}

.navbar-brand{
    color:white !important;
    font-weight:600;
}

.nav-link{
    color:#cbd5e1 !important;
    margin:0 10px;
}

.nav-link:hover{
    color:white !important;
}

/* ===== HERO ===== */
.hero{
    height:280px;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    color:white;

    background:
        linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
        url('https://images.unsplash.com/photo-1588776814546-ec7e7b9e52a1');

    background-size:cover;
}

.hero h1{
    font-size:38px;
    font-weight:600;
}

/* ===== STATS ===== */
.section{
    margin-top:-70px;
    padding:20px;
}

.card-box{
    background:white;
    border-radius:12px;
    padding:25px;
    text-align:center;
    box-shadow:0 8px 20px rgba(0,0,0,0.08);
    transition:0.3s;
}

.card-box:hover{
    transform:translateY(-6px);
}

.icon{
    font-size:30px;
    color:#dc3545;
}

.value{
    font-size:28px;
    font-weight:600;
}

/* ===== ACTION SECTIONS ===== */
.action-section{
    padding:80px 20px;
    background:white;
}

.action-section:nth-child(even){
    background:#f8fafc;
}

.action-container{
    display:flex;
    align-items:center;
    gap:40px;
    flex-wrap:wrap;
}

.action-text{
    flex:1;
}

.action-img{
    flex:1;
}

.action-img img{
    width:100%;
    border-radius:12px;
}

/* ===== ANIMATION ===== */
.fade-up{
    opacity:0;
    transform:translateY(40px);
    transition:all 0.8s ease;
}

.fade-up.show{
    opacity:1;
    transform:translateY(0);
}

/* ===== FOOTER ===== */
.footer{
    text-align:center;
    padding:20px;
    color:#777;
}

</style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
<div class="container-fluid">
<a class="navbar-brand" href="#">Blood Sync</a>

<div>
<a class="nav-link d-inline" href="manage_donor.php">Donors</a>
<a class="nav-link d-inline" href="manage_hospital.php">Hospitals</a>
<a class="nav-link d-inline" href="blood_stock.php">Stock</a>
<a class="nav-link d-inline" href="request_list.php">Requests</a>
<a class="nav-link d-inline" href="reports.php">Reports</a>
<a href="../logout.php" class="btn btn-outline-light btn-sm ms-3">Logout</a>
</div>

</div>
</nav>

<!-- HERO -->
<div class="hero">
<div>
<h1>Blood Management Dashboard</h1>
<p>Monitor donors, hospitals & emergency requests</p>
</div>
</div>

<!-- STATS -->
<div class="container section">

<div class="row g-4">

<div class="col-md-3">
<div class="card-box">
<div class="icon"><i class="bi bi-people-fill"></i></div>
<p>Total Donors</p>
<h4><?php echo $total_donors; ?></h4>
</div>
</div>

<div class="col-md-3">
<div class="card-box">
<div class="icon"><i class="bi bi-hospital-fill"></i></div>
<p>Hospitals</p>
<h4><?php echo $total_hospitals; ?></h4>
</div>
</div>

<div class="col-md-3">
<div class="card-box">
<div class="icon"><i class="bi bi-droplet-fill"></i></div>
<p>Blood Units</p>
<h4><?php echo $total_blood; ?></h4>
</div>
</div>

<div class="col-md-3">
<div class="card-box">
<div class="icon"><i class="bi bi-exclamation-triangle-fill"></i></div>
<p>Emergency</p>
<h4><?php echo $emergency_count; ?></h4>
</div>
</div>

<div class="col-md-3">
<div class="card-box">
<div class="icon"><i class="bi bi-clock-fill"></i></div>
<p>Pending</p>
<h4><?php echo $total_requests; ?></h4>
</div>
</div>

</div>

</div>

<!-- SCROLL SECTIONS -->

<div class="action-section">
<div class="container action-container fade-up">
<div class="action-text">
<h2>Manage Donors</h2>
<p>Track and manage all registered donors efficiently.</p>
<a href="manage_donor.php" class="btn btn-primary">Go</a>
</div>
<div class="action-img">
<img src="https://images.unsplash.com/photo-1581594693702-fbdc51b2763b">
</div>
</div>
</div>

<div class="action-section">
<div class="container action-container fade-up">
<div class="action-img">
<img src="https://images.unsplash.com/photo-1586773860418-d37222d8fce3">
</div>
<div class="action-text">
<h2>Hospitals</h2>
<p>Manage hospital records and coordination.</p>
<a href="manage_hospital.php" class="btn btn-success">Go</a>
</div>
</div>
</div>

<div class="action-section">
<div class="container action-container fade-up">
<div class="action-text">
<h2>Blood Stock</h2>
<p>Monitor available blood units in real time.</p>
<a href="blood_stock.php" class="btn btn-warning">Go</a>
</div>
<div class="action-img">
<img src="https://images.unsplash.com/photo-1615461066841-6116e61058f4">
</div>
</div>
</div>

<div class="action-section">
<div class="container action-container fade-up">
<div class="action-img">
<img src="https://images.unsplash.com/photo-1579154204601-01588f351e67">
</div>
<div class="action-text">
<h2>Requests</h2>
<p>Handle all incoming blood requests quickly.</p>
<a href="request_list.php" class="btn btn-danger">Go</a>
</div>
</div>
</div>

<div class="action-section">
<div class="container action-container fade-up">
<div class="action-text">
<h2>Reports</h2>
<p>Analyze trends and improve decisions.</p>
<a href="reports.php" class="btn btn-dark">Go</a>
</div>
<div class="action-img">
<img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71">
</div>
</div>
</div>

<!-- FOOTER -->
<div class="footer">
© 2026 Blood Sync System
</div>

<!-- ANIMATION SCRIPT -->
<script>
const observer = new IntersectionObserver(entries => {
entries.forEach(entry => {
if(entry.isIntersecting){
entry.target.classList.add('show');
}
});
});
document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));
</script>

</body>
</html>