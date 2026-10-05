<?php

include("config/db.php");

$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$blood_group = $_POST['blood_group'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$last_donation = $_POST['last_donation'];
$password = $_POST['password'];

$sql = "INSERT INTO donor(name,age,gender,blood_group,phone,email,address,last_donation,password)

VALUES('$name','$age','$gender','$blood_group','$phone','$email','$address','$last_donation','$password')";

$result = mysqli_query($conn,$sql);

if($result)
{
echo "<script>alert('Donor Registered Successfully'); window.location='login.php';</script>";
}
else
{
echo "Error";
}

?>