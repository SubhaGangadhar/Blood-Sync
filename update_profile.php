<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['donor']))
{
header("Location: ../login.php");
exit();
}

$email = $_SESSION['donor'];

/* Fetch donor details */

$query = mysqli_query($conn,"SELECT * FROM donor WHERE email='$email'");
$data = mysqli_fetch_assoc($query);

/* Update Profile */

if(isset($_POST['update']))
{

$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood_group'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$update = mysqli_query($conn,"
UPDATE donor SET
name='$name',
age='$age',
gender='$gender',
blood_group='$blood_group',
phone='$phone',
address='$address'
WHERE email='$email'
");

if($update)
{
$success="Profile Updated Successfully!";
}
else
{
$error="Profile Update Failed!";
}

}

?>

<!DOCTYPE html>
<html>

<head>

<title>Update Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

<style>

body{
min-height:100vh;
background-image:url("https://images.unsplash.com/photo-1612277795421-9bc7706a4a34");
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

/* Card Design */

.update-card{
max-width:700px;
margin:auto;
margin-top:80px;
background:rgba(255,255,255,0.18);
backdrop-filter:blur(14px);
border-radius:20px;
box-shadow:0 15px 40px rgba(0,0,0,0.4);
padding:40px;
color:white;
}

/* Title */

.title{
text-align:center;
font-weight:700;
margin-bottom:25px;
}

/* Form Inputs */

.form-control{
border-radius:10px;
}

/* Buttons */

.btn-custom{
border-radius:10px;
padding:10px 20px;
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

<div class="update-card">

<h2 class="title">
<i class="fa-solid fa-user-pen"></i> Update Profile
</h2>

<?php
if(isset($success))
{
echo "<div class='alert alert-success text-center'>$success</div>";
}

if(isset($error))
{
echo "<div class='alert alert-danger text-center'>$error</div>";
}
?>

<form method="POST">

<div class="mb-3">
<label class="form-label">Name</label>
<input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>" required>
</div>

<div class="mb-3">
<label class="form-label">Age</label>
<input type="number" name="age" class="form-control" value="<?php echo $data['age']; ?>" required>
</div>

<div class="mb-3">
<label class="form-label">Gender</label>
<select name="gender" class="form-control">

<option value="Male" <?php if($data['gender']=="Male") echo "selected"; ?>>Male</option>

<option value="Female" <?php if($data['gender']=="Female") echo "selected"; ?>>Female</option>

<option value="Other" <?php if($data['gender']=="Other") echo "selected"; ?>>Other</option>

</select>
</div>

<div class="mb-3">
<label class="form-label">Blood Group</label>
<input type="text" name="blood_group" class="form-control" value="<?php echo $data['blood_group']; ?>" required>
</div>

<div class="mb-3">
<label class="form-label">Phone</label>
<input type="text" name="phone" class="form-control" value="<?php echo $data['phone']; ?>" required>
</div>

<div class="mb-3">
<label class="form-label">Address</label>
<textarea name="address" class="form-control" rows="3"><?php echo $data['address']; ?></textarea>
</div>

<div class="text-center mt-4">

<button type="submit" name="update" class="btn btn-success btn-custom me-2">
<i class="fa-solid fa-floppy-disk"></i> Update Profile
</button>

<a href="donor_dashboard.php" class="btn btn-dark btn-custom">
<i class="fa-solid fa-arrow-left"></i> Back to Dashboard
</a>

</div>

</form>

</div>

</div>

</body>

</html>