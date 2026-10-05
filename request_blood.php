<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['hospital']))
{
header("Location: ../login.php");
exit();
}

$hospital_email = $_SESSION['hospital'];
?>

<!DOCTYPE html>
<html>

<head>

<title>Blood Request - Blood Sync</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

<style>

body{
height:100vh;
background-image:url('https://images.unsplash.com/photo-1579154204601-01588f351e67');
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
background:rgba(0,0,0,0.6);
z-index:-1;
}

/* Glass Card */

.form-card{
max-width:950px;
margin:auto;
margin-top:60px;
background:rgba(255,255,255,0.15);
backdrop-filter:blur(15px);
border-radius:20px;
box-shadow:0 15px 40px rgba(0,0,0,0.4);
padding:35px;
color:white;
}

.form-title{
font-weight:700;
letter-spacing:1px;
}

.form-control,
.form-select{
border-radius:10px;
border:none;
padding:10px;
}

.form-control:focus,
.form-select:focus{
box-shadow:0 0 10px rgba(220,53,69,0.5);
}

.form-label{
font-weight:500;
}

.btn-submit{
background:linear-gradient(135deg,#dc3545,#ff4b5c);
border:none;
border-radius:10px;
padding:12px 30px;
font-weight:600;
color:white;
transition:0.3s;
}

.btn-submit:hover{
transform:translateY(-3px);
box-shadow:0 8px 25px rgba(0,0,0,0.3);
}

.btn-back{
background:#212529;
border-radius:10px;
padding:12px 25px;
color:white;
transition:0.3s;
}

.btn-back:hover{
background:#343a40;
transform:translateY(-3px);
}

input,select{
background:rgba(255,255,255,0.9);
}

</style>

</head>

<body>

<div class="container">

<div class="form-card">

<h2 class="text-center form-title mb-4">
<i class="fa-solid fa-droplet"></i> Blood Request Form
</h2>

<form action="request_process.php" method="POST">

<input type="hidden" name="hospital_email" value="<?php echo $hospital_email; ?>">

<div class="row g-4">

<div class="col-md-6">

<label class="form-label">
<i class="fa-solid fa-user"></i> Patient Name
</label>

<input type="text" name="patient_name" class="form-control" required>

</div>

<div class="col-md-3">

<label class="form-label">
<i class="fa-solid fa-droplet"></i> Blood Group
</label>

<select name="blood_group" class="form-select">

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

<div class="col-md-3">

<label class="form-label">
<i class="fa-solid fa-vial"></i> Units Required
</label>

<input type="number" name="units_required" class="form-control" required>

</div>

<div class="col-md-4">

<label class="form-label">
<i class="fa-solid fa-calendar"></i> Required Date
</label>

<input type="date" name="required_date" class="form-control">

</div>

<div class="col-md-4">

<label class="form-label">
<i class="fa-solid fa-triangle-exclamation"></i> Emergency Level
</label>

<select name="emergency_level" class="form-select">

<option>Normal</option>
<option>Urgent</option>

</select>

</div>

</div>

<br><br>

<div class="text-center">

<button class="btn btn-submit">

<i class="fa-solid fa-paper-plane"></i> Submit Request

</button>

<a href="hospital_dashboard.php" class="btn btn-back">

<i class="fa-solid fa-arrow-left"></i> Back

</a>

</div>

</form>

</div>

</div>

</body>

</html>