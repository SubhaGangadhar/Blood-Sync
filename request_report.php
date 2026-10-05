<?php
session_start();
include("../config/db.php");

if(!isset($_SESSION['admin']))
{
    header("Location: ../login.php");
    exit();
}

/* Table Data */
$result = mysqli_query($conn,"SELECT * FROM blood_request");

/* Chart Data */
$chart_query = mysqli_query($conn,"
SELECT blood_group, COUNT(*) as total 
FROM blood_request 
GROUP BY blood_group
");

$labels = [];
$data = [];

while($row = mysqli_fetch_assoc($chart_query)){
    $labels[] = $row['blood_group'];
    $data[] = $row['total'];
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Blood Request Report - Blood Sync</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
body {
    background: linear-gradient(120deg, #f4f0f0, #fff3f3);
    font-family: 'Segoe UI', sans-serif;
}

.container-box{
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 10px 30px rgba(0,0,0,0.1);
}

h2 {
    text-align:center;
    color:#dc3545;
    margin-bottom:25px;
}

/* Chart card */
.chart-card{
    background:#fff;
    border-radius:15px;
    padding:20px;
    box-shadow:0 5px 20px rgba(0,0,0,0.1);
    margin-bottom:30px;
}

/* Table */
.table th {
    background:#dc3545;
    color:white;
    text-align:center;
}

.table td {
    text-align:center;
}

/* Buttons */
.btn{
    min-width:120px;
}
</style>
</head>

<body>

<div class="container mt-5">

<div class="container-box">

<h2><i class="fa-solid fa-chart-column"></i> Blood Request Report</h2>

<!-- 📊 CHART -->
<div class="chart-card">
    <h5 class="text-center mb-3">Blood Request Analytics</h5>
    <canvas id="bloodChart"></canvas>
</div>

<!-- 📋 TABLE -->
<table class="table table-bordered table-striped">

<tr>
<th>ID</th>
<th>Hospital</th>
<th>Patient</th>
<th>Blood Group</th>
<th>Units</th>
<th>Emergency</th>
<th>Status</th>
</tr>

<?php
while($row=mysqli_fetch_assoc($result))
{
if($row['status']=="Approved")
$status="<span class='badge bg-success'>Approved</span>";
elseif($row['status']=="Rejected")
$status="<span class='badge bg-danger'>Rejected</span>";
else
$status="<span class='badge bg-warning text-dark'>Pending</span>";
?>

<tr>
<td><?php echo $row['request_id']; ?></td>
<td><?php echo $row['hospital_name']; ?></td>
<td><?php echo $row['patient_name']; ?></td>
<td><?php echo $row['blood_group']; ?></td>
<td><?php echo $row['units_required']; ?></td>
<td><?php echo $row['emergency_level']; ?></td>
<td><?php echo $status; ?></td>
</tr>

<?php } ?>

</table>

<div class="text-center mt-4">
<button onclick="window.print()" class="btn btn-success">
<i class="fa-solid fa-print"></i> Print
</button>

<a href="reports.php" class="btn btn-dark">
<i class="fa-solid fa-arrow-left"></i> Back
</a>
</div>

</div>

</div>

<!-- 📊 CHART SCRIPT -->
<script>
const ctx = document.getElementById('bloodChart').getContext('2d');

const bloodChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            label: 'Number of Requests',
            data: <?php echo json_encode($data); ?>,
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    precision:0
                }
            }
        }
    }
});
</script>

</body>
</html>