<?php

session_start();
include("config/db.php");

$user_type = $_POST['user_type'];
$email = $_POST['email'];
$password = $_POST['password'];

/* ======================
   ADMIN LOGIN
   ====================== */

if($user_type == "admin")
{

$sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) == 1)
{

$_SESSION['admin'] = $email;

header("Location: admin/dashboard.php");

}
else
{

echo "<script>
alert('Invalid Admin Login');
window.location='login.php';
</script>";

}

}

/* ======================
   DONOR LOGIN (FIXED)
   ====================== */

elseif($user_type == "donor")
{

$sql = "SELECT * FROM donor WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) == 1)
{

$row = mysqli_fetch_assoc($result); // 🔥 IMPORTANT LINE

$_SESSION['donor'] = $email;
$_SESSION['donor_id'] = $row['donor_id']; // ✅ now it works

header("Location: donor/donor_dashboard.php");

}
else
{

echo "<script>
alert('Invalid Donor Login');
window.location='login.php';
</script>";

}

}

/* ======================
   HOSPITAL LOGIN
   ====================== */

elseif($user_type == "hospital")
{

$sql = "SELECT * FROM hospital 
WHERE email='$email' 
AND password='$password' 
AND status='approved'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) == 1)
{

$_SESSION['hospital'] = $email;

header("Location: hospital/hospital_dashboard.php");

}
else
{

echo "<script>
alert('Hospital not approved or invalid login');
window.location='login.php';
</script>";

}

}

?>