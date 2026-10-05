<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['hospital'])){
    header("Location: ../login.php");
    exit();
}

$email = $_SESSION['hospital'];

/* Get hospital name */
$q = mysqli_query($conn,"SELECT hospital_name FROM hospital WHERE email='$email'");
$data = mysqli_fetch_assoc($q);

$hospital_name = $data['hospital_name'];

/* Get form data */
$patient_name = $_POST['patient_name'];
$blood_group = $_POST['blood_group'];
$units = $_POST['units_required'];
$required_date = $_POST['required_date'];
$emergency = $_POST['emergency_level'];

/* Insert request */
$insert = mysqli_query($conn,"INSERT INTO blood_request
(hospital_name, patient_name, blood_group, units_required, emergency_level, required_date, status)
VALUES
('$hospital_name','$patient_name','$blood_group','$units','$emergency','$required_date','Pending')");

if($insert){

    /* 🔔 NOTIFICATION LOGIC START */

    $donors = mysqli_query($conn, "
    SELECT * FROM donor 
    WHERE LOWER(blood_group) = LOWER('$blood_group')
    ");

    while ($donor = mysqli_fetch_assoc($donors)) {

        $donor_id = $donor['donor_id'];
        $last_donation = $donor['last_donation'];

        $eligible = true;

        if ($last_donation != NULL && $last_donation != '0000-00-00') {

            $last_date = strtotime($last_donation);
            $current_date = strtotime(date("Y-m-d"));

            $days = ($current_date - $last_date) / (60 * 60 * 24);

            if ($days < 90) {
                $eligible = false;
            }
        }

        if ($eligible) {

            $message = "New Blood Request: $blood_group needed for patient $patient_name at $hospital_name.";

            mysqli_query($conn, "
            INSERT INTO notifications (user_id, user_type, message) 
            VALUES ('$donor_id','donor','$message')
            ");
        }
    }

    echo "<script>alert('Request Submitted Successfully'); window.location='request_status.php';</script>";
}else{
    echo "Error: ".mysqli_error($conn);
}
?>