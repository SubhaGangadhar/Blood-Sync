<?php

include("../config/db.php");

$blood_group = $_POST['blood_group'];
$units = $_POST['units'];
$donation_date = $_POST['donation_date'];
$expiry_date = $_POST['expiry_date'];

$sql = "INSERT INTO blood_stock(blood_group,units,donation_date,expiry_date)

VALUES('$blood_group','$units','$donation_date','$expiry_date')";

mysqli_query($conn,$sql);

header("Location: blood_stock.php");

?>