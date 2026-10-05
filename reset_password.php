<?php
include("config/db.php");

$email = $_GET['email'];
$role  = $_GET['role'];

// Decide table
if($role == "donor"){
    $table = "donor";
}
elseif($role == "hospital"){
    $table = "hospital";
}

if(isset($_POST['update_password']))
{
    $new_password = $_POST['new_password'];

    mysqli_query($conn,"UPDATE $table SET password='$new_password' WHERE email='$email'");

    echo "<script>
    alert('Password Updated Successfully');
    window.location='login.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Reset Password</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
body{
    background: linear-gradient(135deg,#43cea2,#185a9d);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family: 'Segoe UI', sans-serif;
}

/* Card Design */
.card-box{
    width:100%;
    max-width:420px;
    border-radius:20px;
    box-shadow:0 15px 40px rgba(0,0,0,0.25);
    animation: fadeIn 0.8s ease-in-out;
    overflow:hidden;
}

/* Header */
.card-header{
    background:linear-gradient(135deg,#00c6ff,#0072ff);
    color:#fff;
    text-align:center;
    padding:25px;
}

/* Input */
.form-control{
    border-radius:12px;
    padding:12px;
}

/* Button */
.btn-custom{
    background:linear-gradient(135deg,#00c6ff,#0072ff);
    border:none;
    border-radius:30px;
    padding:12px;
    font-weight:600;
    color:white;
    transition:0.3s;
}

.btn-custom:hover{
    transform:scale(1.05);
}

/* Icon */
.icon{
    font-size:50px;
    margin-bottom:10px;
}

/* Fade Animation */
@keyframes fadeIn{
    from{opacity:0; transform:translateY(30px);}
    to{opacity:1; transform:translateY(0);}
}

/* Eye icon positioning */
.password-box{
    position:relative;
}

.toggle-eye{
    position:absolute;
    top:12px;
    right:15px;
    cursor:pointer;
    color:#555;
}
</style>

</head>

<body>

<div class="card card-box">

<div class="card-header">
    <i class="fa-solid fa-lock icon"></i>
    <h3>Reset Password</h3>
    <p class="mb-0">Enter your new password</p>
</div>

<div class="card-body p-4">

<form method="POST">

<!-- NEW PASSWORD -->
<div class="mb-3 password-box">
<label class="form-label">New Password</label>
<input type="password" name="new_password" id="password" class="form-control" placeholder="Enter new password" required>
<i class="fa-solid fa-eye toggle-eye" onclick="togglePassword()"></i>
</div>

<!-- CONFIRM PASSWORD -->
<div class="mb-3">
<label class="form-label">Confirm Password</label>
<input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm password" required>
</div>

<!-- BUTTON -->
<button type="submit" name="update_password" class="btn btn-custom w-100">
    <i class="fa-solid fa-check me-2"></i> Update Password
</button>

</form>

<!-- BACK -->
<div class="text-center mt-3">
<a href="login.php" class="text-decoration-none text-muted">
    <i class="fa-solid fa-arrow-left"></i> Back to Login
</a>
</div>

</div>

</div>

<!-- JS -->
<script>
function togglePassword(){
    var pass = document.getElementById("password");
    if(pass.type === "password"){
        pass.type = "text";
    } else {
        pass.type = "password";
    }
}
</script>

</body>
</html>