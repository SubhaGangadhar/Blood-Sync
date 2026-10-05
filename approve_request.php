<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['admin']))
{
    header("Location: ../login.php");
    exit();
}

if(isset($_GET['id']))
{
    $request_id = $_GET['id'];

    /* Get request details */
    $req = mysqli_query($conn,"SELECT * FROM blood_request WHERE request_id='$request_id'");
    $request = mysqli_fetch_assoc($req);

    if(!$request){
        echo "<script>alert('Invalid Request'); window.location='request_list.php';</script>";
        exit();
    }

    /* ✅ PREVENT DOUBLE APPROVAL */
    if($request['status'] == "Approved" || $request['status'] == "Rejected")
    {
        echo "<script>
        alert('Request already processed!');
        window.location='request_list.php';
        </script>";
        exit();
    }

    $blood_group = $request['blood_group'];
    $units_needed = $request['units_required'];

    /* Get total available stock */
    $stock_query = mysqli_query($conn,
    "SELECT SUM(units) as total_units FROM blood_stock WHERE blood_group='$blood_group'");

    $stock = mysqli_fetch_assoc($stock_query);
    $available_units = $stock['total_units'] ?? 0;

    if($available_units >= $units_needed)
    {
        /* Deduct units from stock */
        $remaining = $units_needed;

        $stocks = mysqli_query($conn,
        "SELECT * FROM blood_stock WHERE blood_group='$blood_group' AND units > 0 ORDER BY stock_id");

        while($row = mysqli_fetch_assoc($stocks))
        {
            if($remaining <= 0) break;

            $stock_id = $row['stock_id'];
            $stock_units = $row['units'];

            if($stock_units <= $remaining)
            {
                mysqli_query($conn,"UPDATE blood_stock SET units=0 WHERE stock_id='$stock_id'");
                $remaining -= $stock_units;
            }
            else
            {
                $new_units = $stock_units - $remaining;
                mysqli_query($conn,"UPDATE blood_stock SET units='$new_units' WHERE stock_id='$stock_id'");
                $remaining = 0;
            }
        }

        /* ✅ IMPORTANT: CORRECT STATUS */
        mysqli_query($conn,
        "UPDATE blood_request SET status='Approved' WHERE request_id='$request_id'");

        echo "<script>
        alert('Request Approved and Blood Stock Updated');
        window.location='request_list.php';
        </script>";
    }
    else
    {
        echo "<script>
        alert('Not enough blood units available!');
        window.location='request_list.php';
        </script>";
    }
}
else
{
    header("Location: request_list.php");
}
?>