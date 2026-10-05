<?php
session_start();
include('../config/db.php');

if(!isset($_SESSION['donor'])){
    header("Location: ../login.php");
    exit();
}

$donor_id = $_SESSION['donor_id'];

/* Fetch notifications */
$result = mysqli_query($conn, "
SELECT * FROM notifications 
WHERE user_id='$donor_id' 
AND user_type='donor'
ORDER BY id DESC
");

/* Mark as read */
mysqli_query($conn, "
UPDATE notifications 
SET status='read' 
WHERE user_id='$donor_id' AND user_type='donor'
");
?>

<!DOCTYPE html>
<html>
<head>

<title>Notifications</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

<style>

body{
min-height:100vh;
background: linear-gradient(135deg,#8b0000,#ff4d4d);
font-family:'Segoe UI',sans-serif;
}

/* Overlay */
body::before{
content:"";
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.6);
z-index:-1;
}

/* Main Card */
.container-box{
max-width:800px;
margin:auto;
margin-top:60px;
background:rgba(255,255,255,0.15);
backdrop-filter:blur(15px);
border-radius:20px;
padding:30px;
box-shadow:0 10px 40px rgba(0,0,0,0.4);
color:white;
}

/* Title */
.title{
text-align:center;
font-weight:700;
margin-bottom:25px;
}

/* Notification Card */
.notify-card{
background:rgba(255,255,255,0.2);
border-radius:15px;
padding:15px 20px;
margin-bottom:15px;
transition:0.3s;
position:relative;
}

.notify-card:hover{
transform:translateY(-4px);
box-shadow:0 8px 20px rgba(0,0,0,0.3);
}

/* Icon */
.notify-icon{
font-size:20px;
margin-right:10px;
color:#ffc107;
}

/* Time */
.notify-time{
font-size:12px;
opacity:0.8;
}

/* Empty */
.empty{
text-align:center;
padding:20px;
opacity:0.8;
}

/* Back button */
.back-btn{
margin-top:15px;
}

</style>

</head>

<body>

<div class="container">

<div class="container-box">

<h3 class="title">
<i class="fa-solid fa-bell"></i> Notifications
</h3>

<?php if(mysqli_num_rows($result) > 0) { ?>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <div class="notify-card">

            <div class="d-flex align-items-start">

                <i class="fa-solid fa-droplet notify-icon"></i>

                <div>
                    <p class="mb-1"><?php echo $row['message']; ?></p>
                    <div class="notify-time">
                        <i class="fa-regular fa-clock"></i>
                        <?php echo $row['date']; ?>
                    </div>
                </div>

            </div>

        </div>

    <?php } ?>

<?php } else { ?>

    <div class="empty">
        <i class="fa-regular fa-bell-slash fa-2x mb-2"></i>
        <p>No notifications available</p>
    </div>

<?php } ?>

<div class="text-center back-btn">
    <a href="donor_dashboard.php" class="btn btn-light">
        <i class="fa-solid fa-arrow-left"></i> Back to Dashboard
    </a>
</div>

</div>

</div>

</body>
</html>