<?php
include("../config/db.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];

    // Delete query
    $delete = mysqli_query($conn, "DELETE FROM blood_stock WHERE stock_id='$id'");

    if($delete){
        header("Location: blood_stock.php?msg=deleted");
    } else {
        echo "Error deleting record!";
    }

}else{
    echo "Invalid Request!";
}
?>