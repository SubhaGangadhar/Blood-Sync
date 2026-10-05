<?php
session_start();
include("../config/db.php");

/* ✅ Admin session check */
if(!isset($_SESSION['admin']))
{
    header("Location: ../login.php");
    exit();
}

/* ✅ Check ID exists */
if(isset($_GET['id']))
{
    $id = $_GET['id'];

    /* Get request details */
    $check = mysqli_query($conn,"SELECT * FROM blood_request WHERE request_id='$id'");
    $request = mysqli_fetch_assoc($check);

    if(!$request)
    {
        echo "<script>
        alert('Invalid Request!');
        window.location='request_list.php';
        </script>";
        exit();
    }

    /* ✅ Prevent double action */
    if($request['status'] == "Approved" || $request['status'] == "Rejected")
    {
        echo "<script>
        alert('Request already processed!');
        window.location='request_list.php';
        </script>";
        exit();
    }

    /* ✅ Update status */
    $sql = "UPDATE blood_request SET status='Rejected' WHERE request_id='$id'";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>
        alert('Request Rejected Successfully');
        window.location='request_list.php';
        </script>";
    }
    else
    {
        echo "Error: " . mysqli_error($conn);
    }
}
else
{
    header("Location: request_list.php");
}
?>