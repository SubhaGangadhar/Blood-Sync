<?php
session_start();
include("../config/db.php");

$result = mysqli_query($conn,"SELECT * FROM donor");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Donor Report - Blood Sync</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(120deg, #f6f0f0, #ffe6e6);
            font-family: 'Segoe UI', sans-serif;
            padding-bottom: 50px;
        }

        h2 {
            font-weight: 700;
            text-align: center;
            color: #dc3545;
            margin-bottom: 30px;
        }

        h2::after {
            content: '';
            display: block;
            width: 120px;
            height: 4px;
            background: linear-gradient(90deg,#ff4d4d,#8b0000);
            margin: 8px auto 0 auto;
            border-radius: 2px;
        }

        .table-wrapper {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .table-wrapper:hover {
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        table th {
            background: linear-gradient(135deg,#dc3545,#ff6b6b);
            color: white;
            text-align: center;
        }

        table td {
            vertical-align: middle;
        }

        table tr:hover {
            background-color: #ffe6e6;
        }

        .btn-back {
            display: block;
            width: 200px;
            margin: 30px auto 0 auto;
            background: #343a40;
            color: white;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
            text-align: center;
            transition: 0.3s;
            text-decoration: none;
        }

        .btn-back:hover {
            background: #495057;
            transform: translateY(-2px);
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container mt-5">

    <h2>Donor Report</h2>

    <div class="table-wrapper">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Blood Group</th>
                    <th>Phone</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row=mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td class="text-center"><?php echo $row['donor_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td class="text-center"><?php echo $row['age']; ?></td>
                    <td class="text-center"><?php echo ucfirst($row['gender']); ?></td>
                    <td class="text-center"><?php echo $row['blood_group']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <a href="reports.php" class="btn-back"><i class="fa-solid fa-arrow-left"></i> Back to Reports</a>

</div>

</body>
</html>