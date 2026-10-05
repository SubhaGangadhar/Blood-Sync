<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['admin']))
{
header("Location: ../login.php");
exit();
}

$result = mysqli_query($conn,"SELECT * FROM blood_request");
?>

<!DOCTYPE html>
<html>
<head>

<title>Blood Requests</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background:#f5f5f5;">

<div class="container mt-5">

<h2 class="text-center text-danger">Blood Requests</h2>

<br>

<table class="table table-bordered table-striped text-center">

<thead class="table-danger">

<tr>
<th>ID</th>
<th>Hospital Name</th>
<th>Patient</th>
<th>Blood Group</th>
<th>Units</th>
<th>Emergency Level</th>
<th>Status</th>
<th>Action</th>
</tr>

</thead>

<tbody>

<?php
while($row=mysqli_fetch_assoc($result))
{

$color = "";
$status_badge = "";

/* Emergency Highlight */
if($row['emergency_level'] == "Urgent")
{
$color = "table-danger";
}

/* ✅ FIXED STATUS BADGE */
if($row['status'] == "Approved")
{
$status_badge = "<span class='badge bg-success'>Approved</span>";
}
elseif($row['status'] == "Rejected")
{
$status_badge = "<span class='badge bg-danger'>Rejected</span>";
}
else
{
$status_badge = "<span class='badge bg-warning text-dark'>Pending</span>";
}
?>

<tr class="<?php echo $color; ?>">

<td><?php echo $row['request_id']; ?></td>
<td><?php echo $row['hospital_name']; ?></td>
<td><?php echo $row['patient_name']; ?></td>
<td><?php echo $row['blood_group']; ?></td>
<td><?php echo $row['units_required']; ?></td>
<td><?php echo $row['emergency_level']; ?></td>
<td><?php echo $status_badge; ?></td>

<td>

<?php
if($row['status'] == "Pending")
{
?>

<a href="approve_request.php?id=<?php echo $row['request_id']; ?>" 
class="btn btn-success btn-sm"
onclick="return confirm('Approve this request?');">
Approve
</a>

<a href="reject_request.php?id=<?php echo $row['request_id']; ?>" 
class="btn btn-danger btn-sm"
onclick="return confirm('Reject this request?');">
Reject
</a>

<?php
}
elseif($row['status'] == "Approved")
{
echo "<span class='text-success fw-bold'>Approved</span>";
}
else
{
echo "<span class='text-danger fw-bold'>Rejected</span>";
}
?>

</td>

</tr>

<?php
}
?>

</tbody>

</table>

<br>

<div class="text-center">

<a href="dashboard.php" class="btn btn-dark">
Back to Dashboard
</a>

</div>

</div>

</body>
</html>