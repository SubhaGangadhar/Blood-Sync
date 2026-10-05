<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | Blood Sync</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
/* Body */
body {
    margin: 0;
    height: 100vh;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #8b0000 0%, #ff4d4d 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

/* Gradient shapes background */
body::before {
    content: '';
    position: absolute;
    width: 120%;
    height: 120%;
    background: radial-gradient(circle, rgba(255,255,255,0.05), transparent 70%);
    top: -10%;
    left: -10%;
    transform: rotate(45deg);
    z-index: 0;
}

/* Container */
.main-container {
    position: relative;
    z-index: 1;
    display: flex;
    width: 100%;
    max-width: 1000px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.3);
    border-radius: 20px;
    overflow: hidden;
    background: rgba(255,255,255,0.05);
}

/* Left panel */
.left-panel {
    background: linear-gradient(135deg,#ff4d4d,#8b0000);
    color: white;
    padding: 50px;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.left-panel h1 {
    font-size: 42px;
    font-weight: 700;
    margin-bottom: 20px;
}
.left-panel p {
    font-size: 16px;
    opacity: 0.9;
    line-height: 1.5;
}

/* Login card */
.login-card {
    flex: 1;
    background: #ffffff;
    padding: 40px 30px;
    border-radius: 20px;
    box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    animation: slideIn 0.8s ease forwards;
}
@keyframes slideIn {
    0% { transform: translateX(50px); opacity: 0; }
    100% { transform: translateX(0); opacity: 1; }
}
.login-title {
    text-align: center;
    font-weight: 700;
    color: #b30000;
    margin-bottom: 30px;
}

/* Inputs */
.form-control {
    height: 45px;
    border-radius: 10px;
    border: 1px solid #ccc;
}
.input-group-text {
    background: #b30000;
    color: white;
    border: none;
    border-radius: 10px 0 0 10px;
}

/* Buttons */
.btn-login {
    background: #b30000;
    color: white;
    height: 45px;
    border-radius: 10px;
    font-weight: 600;
    transition: 0.3s;
}
.btn-login:hover {
    background: #8b0000;
    color: #fff;
    transform: scale(1.02);
}
.btn-home {
    background: #6c757d;
    color: white;
    height: 45px;
    border-radius: 10px;
    font-weight: 600;
    margin-top: 15px;
    transition: 0.3s;
}
.btn-home:hover {
    background: #5a6268;
    color: white;
    transform: scale(1.02);
}

/* Footer text */
.footer-text {
    text-align: center;
    margin-top: 15px;
    font-size: 13px;
    color: #777;
}

/* Responsive */
@media(max-width: 768px){
    .main-container {
        flex-direction: column;
        border-radius: 15px;
        margin: 15px;
    }
    .left-panel {
        display: none;
    }
}
</style>

</head>
<body>

<div class="container main-container">

    <!-- LEFT PANEL -->
    <div class="left-panel d-none d-md-flex">
        <h1><i class="fa-solid fa-droplet"></i> Blood Sync</h1>
        <p>A Unified Blood Management System connecting donors, hospitals and blood banks to ensure blood availability during emergencies.</p>
    </div>

    <!-- LOGIN FORM -->
    <div class="login-card">
        <h4 class="login-title">Account Login</h4>

        <form action="login_process.php" method="POST">

            <label class="mb-1">User Type</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                <select name="user_type" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="donor">Donor</option>
                    <option value="hospital">Hospital</option>
                </select>
            </div>

            <label class="mb-1">Email Address</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>

            <label class="mb-1">Password</label>
            <div class="input-group mb-4">
                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>

            <div class="d-grid">
                <button class="btn btn-login"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
            </div>
        </form>

        
        <a href="forgot_password.php" class="btn btn-home d-grid">
            <i class="fa-solid fa-key me-2"></i> Forgot Password
        </a>


        <!-- Back to Home Button -->
        <a href="index.php" class="btn btn-home d-grid"><i class="fa-solid fa-house"></i> Back to Home</a>

        <div class="footer-text">Blood Sync © 2026</div>
    </div>

</div>

</body>
</html>