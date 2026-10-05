<?php
include("config/db.php");
?>

<!DOCTYPE html>
<html>

<head>

<title>Emergency Blood Request</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

<style>

body{
min-height:100vh;
background-image:url("https://images.unsplash.com/photo-1615461066841-6116e61058f4");
background-size:cover;
background-position:center;
background-repeat:no-repeat;
font-family:'Segoe UI',sans-serif;
}

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

.form-card{
max-width:900px;
margin:auto;
margin-top:70px;
background:rgba(255,255,255,0.18);
backdrop-filter:blur(12px);
border-radius:20px;
box-shadow:0 15px 40px rgba(0,0,0,0.4);
padding:40px;
color:white;
}

.form-title{
text-align:center;
font-weight:700;
margin-bottom:30px;
}

label{
font-weight:500;
margin-bottom:5px;
}

.form-control, .form-select{
border-radius:10px;
}

.btn-submit{
padding:12px 25px;
border-radius:10px;
font-weight:600;
transition:0.3s;
}

.btn-submit:hover{
transform:translateY(-2px);
box-shadow:0 6px 20px rgba(0,0,0,0.3);
}

.btn-back{
padding:12px 25px;
border-radius:10px;
font-weight:600;
margin-left:10px;
}

</style>

</head>

<body>

<div class="container">

<div class="form-card">

<h2 class="form-title">
<i class="fa-solid fa-triangle-exclamation"></i> Emergency Blood Request
</h2>

<form action="emergency_process.php" method="POST">

<div class="row g-3">

<div class="col-md-6">

<label><i class="fa-solid fa-hospital"></i> Hospital Name</label>

<select name="hospital_name" class="form-select" required>

<option value="">Select Hospital</option>

<?php
$sql = "SELECT hospital_name FROM hospital";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result))
{
?>

<option value="<?php echo $row['hospital_name']; ?>">
<?php echo $row['hospital_name']; ?>
</option>

<?php
}
?>

</select>

</div>

<div class="col-md-6">

<label><i class="fa-solid fa-user"></i> Patient Name</label>

<input type="text" name="patient_name" class="form-control" placeholder="Enter Patient Name" required>

</div>

</div>

<br>

<div class="row g-3">

<div class="col-md-4">

<label><i class="fa-solid fa-droplet"></i> Blood Group</label>

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

<div class="col-md-4">

<label><i class="fa-solid fa-flask"></i> Units Required</label>

<input type="number" name="units_required" class="form-control" placeholder="Enter Units" required>

</div>

<div class="col-md-4">

<label><i class="fa-solid fa-calendar-days"></i> Required Date</label>

<input type="date" name="required_date" class="form-control">

</div>

</div>

<br>

<div class="row g-3">

<div class="col-md-6">

<label><i class="fa-solid fa-bolt"></i> Emergency Level</label>

<input type="text" value="Urgent" class="form-control" readonly>

<input type="hidden" name="emergency_level" value="Urgent">

</div>

</div>

<br><br>

<div class="text-center">

<button type="submit" class="btn btn-danger btn-submit">
<i class="fa-solid fa-paper-plane"></i> Submit Request
</button>

<a href="index.php" class="btn btn-dark btn-back">
<i class="fa-solid fa-arrow-left"></i> Back to Dashboard
</a>

</div>

</form>

</div>

</div>

</body>

</html>