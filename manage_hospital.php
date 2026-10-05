<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit();
}

$result = mysqli_query($conn,"SELECT * FROM hospital");
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Hospital - Blood Sync</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

<style>

/* ===== BACKGROUND IMAGE (LOCAL FIX) ===== */
/* ===== BACKGROUND IMAGE (ONLINE - WORKING) ===== */
/* ===== CLEAR BACKGROUND IMAGE (NO BLUR) ===== */
/* ===== HOSPITAL ENTRANCE BACKGROUND ===== */
/* ===== BODY BASE ===== */
body{
    margin:0;
    font-family:'Segoe UI',sans-serif;
    position: relative;
    z-index: 1;
}

/* ===== BLURRED BACKGROUND ===== */
body::before{
    content: "";
    position: fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;

    background: url('https://images.pexels.com/photos/305568/pexels-photo-305568.jpeg') no-repeat center center;
    background-size: cover;

    filter: blur(5px); /* adjust: 3px = light blur, 6px = strong blur */
    z-index: -1;
}

/* ===== HEADING ===== */
h2{
    font-weight:700;
}

/* ===== TABLE WRAPPER ===== */
.table-wrapper{
    background: rgba(255,255,255,0.97);
    backdrop-filter: blur(8px);
    padding:25px;
    border-radius:12px;
    box-shadow:0 10px 25px rgba(0,0,0,0.1);
    transition:0.3s;
}

.table-wrapper:hover{
    box-shadow:0 14px 30px rgba(0,0,0,0.15);
}

/* ===== TABLE ===== */
.table th{
    background:linear-gradient(135deg,#28a745,#6dde8a);
    color:white;
    text-align:center;
}

.table td{
    vertical-align:middle;
}

.table tr:hover{
    background:#f1f1f1;
}

/* ===== BUTTONS ===== */
.btn-approve{
    background:linear-gradient(135deg,#28a745,#6dde8a);
    color:white;
    border-radius:8px;
}

.btn-delete{
    background:linear-gradient(135deg,#dc3545,#ff6b6b);
    color:white;
    border-radius:8px;
}

.btn-back{
    margin-top:20px;
    background:#343a40;
    color:white;
    border-radius:8px;
    padding:10px 20px;
}

.btn-back:hover{
    background:#495057;
}

/* ===== HEADING LINE ===== */
.container h2.text-danger::after{
    content:'';
    display:block;
    width:80px;
    height:4px;
    background:linear-gradient(90deg,#28a745,#6dde8a);
    margin:8px auto;
    border-radius:2px;
}

</style>

</head>

<body>

<div class="container mt-5">

<h2 class="text-center text-danger">Manage Hospital</h2>

<div class="table-wrapper mt-4">

<table class="table table-bordered table-striped">

<thead>
<tr>
<th>ID</th>
<th>Hospital Name</th>
<th>Location</th>
<th>Contact Person</th>
<th>Phone</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_assoc($result)){
?>

<tr>

<td class="text-center"><?php echo $row['hospital_id']; ?></td>
<td><?php echo $row['hospital_name']; ?></td>
<td><?php echo $row['location']; ?></td>
<td><?php echo $row['contact_person']; ?></td>
<td><?php echo $row['phone']; ?></td>

<td class="text-center">
<?php
if($row['status']=="approved"){
echo "<span class='badge bg-success'>Approved</span>";
}else{
echo "<span class='badge bg-warning text-dark'>Pending</span>";
}
?>
</td>

<td class="text-center">

<?php if($row['status']!="approved"){ ?>
<a href="./approve_hospital.php?id=<?php echo $row['hospital_id']; ?>" 
class="btn btn-approve btn-sm">
<i class="fa-solid fa-check"></i> Approve
</a>
<?php } ?>

<a href="./delete_hospital.php?id=<?php echo $row['hospital_id']; ?>" 
class="btn btn-delete btn-sm"
onclick="return confirm('Are you sure you want to delete this hospital?')">
<i class="fa-solid fa-trash"></i> Delete
</a>

</td>

</tr>

<?php
}
}else{
echo "<tr><td colspan='7' class='text-center text-danger'>No Hospitals Found</td></tr>";
}
?>

</tbody>

</table>

</div>

<a href="dashboard.php" class="btn btn-back">
<i class="fa-solid fa-arrow-left"></i> Back
</a>

</div>

</body>
</html>