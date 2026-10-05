<?php

include("config/db.php");

$hospital_name = $_POST['hospital_name'];
$location = $_POST['location'];
$contact_person = $_POST['contact_person'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$license_number = $_POST['license_number'];
$password = $_POST['password'];

$status = "pending";

$sql = "INSERT INTO hospital
(hospital_name,location,contact_person,phone,email,license_number,password,status)

VALUES
('$hospital_name','$location','$contact_person','$phone','$email','$license_number','$password','$status')";

$result = mysqli_query($conn,$sql);

if($result)
{
echo "<script>alert('Hospital Registered Successfully. Waiting for Admin Approval'); window.location='login.php';</script>";
}
else
{
echo "Error";
}

?>