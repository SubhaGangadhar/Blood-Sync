<?php
session_start();
include("../config/db.php");

/* Check admin login */
if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit();
}

/* Validate ID */
if(isset($_GET['id']) && is_numeric($_GET['id'])){

    $id = intval($_GET['id']);

    /* Correct column name used here */
    $query = "DELETE FROM donor WHERE donor_id = $id";

    if(mysqli_query($conn, $query)){
        header("Location: manage_donor.php?msg=deleted");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

} else {
    echo "Invalid request!";
}
?>