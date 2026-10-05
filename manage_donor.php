<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM donor");
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Donors | Blood Sync</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>

/* ===== BODY BACKGROUND ===== */
body{
    margin:0;
    font-family:'Segoe UI',sans-serif;

    background:
        linear-gradient(rgba(255,255,255,0.92), rgba(255,255,255,0.92)),
        url('https://images.unsplash.com/photo-1582719478250-c89cae4dc85b');

    background-size:cover;
    background-position:center;
    background-attachment:fixed;
}

/* ===== HERO QUOTE SECTION ===== */
.hero{
    height:220px;
    display:flex;
    align-items:center;
    justify-content:center;
    text-align:center;
    color:white;

    background:
        linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
        url('https://images.unsplash.com/photo-1615461066841-6116e61058f4');

    background-size:cover;
    background-position:center;
}

.hero h1{
    font-size:28px;
    font-weight:600;
}

.hero p{
    font-size:16px;
    opacity:0.9;
}

/* ===== MAIN CONTAINER ===== */
.container-wrapper{
    display:flex;
    justify-content:center;
    padding:30px;
}

.container-box{
    width:90%;
    max-width:950px;
    background: rgba(255,255,255,0.9);
    backdrop-filter: blur(8px);
    padding:30px;
    border-radius:14px;
    box-shadow:0 15px 40px rgba(0,0,0,0.12);
}

/* ===== HEADER ===== */
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

/* ===== TABLE ===== */
.table{
    border-radius:10px;
    overflow:hidden;
}

.table tbody tr:hover{
    background:#f1f5f9;
}

/* ===== BUTTONS ===== */
.btn{
    border-radius:8px;
}

</style>

</head>

<body>

<!-- HERO WITH QUOTE -->
<div class="hero">
<div>
<h1>“Donate Blood, Save Lives ❤️”</h1>
<p>Your one donation can give someone a second chance at life.</p>
</div>
</div>

<div class="container-wrapper">

<div class="container-box">

<!-- HEADER -->
<div class="header">
<h2><i class="bi bi-people-fill text-danger"></i> Manage Donors</h2>

<a href="dashboard.php" class="btn btn-dark btn-sm">
<i class="bi bi-arrow-left"></i> Back to Dashboard
</a>
</div>

<!-- SUCCESS MESSAGE -->
<?php
if(isset($_GET['msg']) && $_GET['msg'] == 'deleted'){
    echo "<div class='alert alert-success'>Donor deleted successfully</div>";
}
?>

<!-- TABLE -->
<table class="table table-bordered table-striped mt-3 text-center">

<thead class="table-dark">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Action</th>
</tr>
</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>
<td><?php echo $row['donor_id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>

<td>
<a href="delete_donor.php?id=<?php echo $row['donor_id']; ?>" 
   class="btn btn-danger btn-sm"
   onclick="return confirm('Are you sure you want to delete this donor?');">
   <i class="bi bi-trash"></i> Delete
</a>
</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>
</html>