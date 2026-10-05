<?php
include("config/db.php");

if(isset($_POST['check_email']))
{
    $email = $_POST['email'];
    $role  = $_POST['role'];

    if($role == "donor"){
        $table = "donor";
    }
    elseif($role == "hospital"){
        $table = "hospital";
    }

    $query = "SELECT * FROM $table WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Failed: " . mysqli_error($conn));
    }

    if(mysqli_num_rows($result) > 0)
    {
        header("Location: reset_password.php?email=$email&role=$role");
    }
    else
    {
        echo "<script>alert('Email not found');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Forgot Password</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
body{
    background: linear-gradient(135deg,#667eea,#764ba2);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family: 'Segoe UI', sans-serif;
}

.card-box{
    width:100%;
    max-width:420px;
    border-radius:20px;
    box-shadow:0 15px 35px rgba(0,0,0,0.2);
    animation: fadeIn 0.8s ease-in-out;
}

.card-header{
    background:linear-gradient(135deg,#ff416c,#ff4b2b);
    color:#fff;
    text-align:center;
    padding:20px;
    border-top-left-radius:20px;
    border-top-right-radius:20px;
}

.form-control{
    border-radius:10px;
    padding:12px;
}

.btn-custom{
    background:linear-gradient(135deg,#ff416c,#ff4b2b);
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

.icon{
    font-size:50px;
    margin-bottom:10px;
}

@keyframes fadeIn{
    from{opacity:0; transform:translateY(20px);}
    to{opacity:1; transform:translateY(0);}
}
</style>

</head>

<body>

<div class="card card-box">

<div class="card-header">
    <i class="fa-solid fa-key icon"></i>
    <h3>Forgot Password</h3>
    <p class="mb-0">Reset your account password</p>
</div>

<div class="card-body p-4">

<form method="POST">

<!-- ROLE -->
<div class="mb-3">
<label class="form-label">Select Role</label>
<select name="role" class="form-control" required>
    <option value="">Choose Role</option>
    <option value="donor">Donor</option>
    <option value="hospital">Hospital</option>
</select>
</div>

<!-- EMAIL -->
<div class="mb-3">
<label class="form-label">Email Address</label>
<input type="email" name="email" class="form-control" placeholder="Enter your email" required>
</div>

<!-- BUTTON -->
<button type="submit" name="check_email" class="btn btn-custom w-100">
    <i class="fa-solid fa-check me-2"></i> Verify Email
</button>

</form>

<!-- BACK LINK -->
<div class="text-center mt-3">
<a href="login.php" class="text-decoration-none text-muted">
    <i class="fa-solid fa-arrow-left"></i> Back to Login
</a>
</div>

</div>

</div>

</body>
</html>