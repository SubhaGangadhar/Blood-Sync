<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hospital Registration | Blood Sync</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #4d79ff, #1a237e);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

/* Card */
.registration-card {
    background: #fff;
    border-radius: 20px;
    padding: 40px 35px;
    max-width: 900px;
    width: 100%;
    box-shadow: 0 20px 50px rgba(0,0,0,0.3);
    animation: fadeIn 0.8s ease;
}

/* Animation */
@keyframes fadeIn {
    0% { opacity: 0; transform: translateY(20px);}
    100% { opacity: 1; transform: translateY(0);}
}

/* Section title */
.registration-title {
    text-align: center;
    font-size: 32px;
    font-weight: 700;
    color: #1a237e;
    margin-bottom: 30px;
}

/* Sections */
.card-section {
    background: #f1f5fb;
    padding: 20px 20px 10px 20px;
    border-radius: 15px;
    margin-bottom: 25px;
}

.section-title {
    font-weight: 600;
    color: #1a237e;
    margin-bottom: 15px;
    font-size: 18px;
}

/* Floating labels */
.form-floating input,
.form-floating select {
    border-radius: 10px;
    height: 50px;
    box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);
    border: 1px solid #ccc;
    transition: 0.3s;
}
.form-floating input:focus,
.form-floating select:focus {
    border-color: #1a237e;
    box-shadow: 0 0 10px rgba(26,35,126,0.2);
}
.form-floating label {
    font-weight: 500;
}

/* Buttons */
.btn-register {
    background: #1a237e;
    color: #fff;
    border-radius: 10px;
    font-weight: 600;
    height: 50px;
    transition: 0.3s;
}
.btn-register:hover {
    background: #0d153d;
    transform: scale(1.03);
}

.btn-home {
    background: #6c757d;
    color: #fff;
    border-radius: 10px;
    font-weight: 600;
    height: 50px;
    transition: 0.3s;
    margin-top: 10px;
}
.btn-home:hover {
    background: #5a6268;
    transform: scale(1.03);
}

@media(max-width:768px){
    .registration-card { padding: 30px 20px; }
    .registration-title { font-size: 28px; }
}
</style>
</head>
<body>

<div class="registration-card">

    <h2 class="registration-title"><i class="fa-solid fa-hospital"></i> Hospital Registration</h2>

    <form action="hospital_register_process.php" method="POST">

        <!-- Basic Info -->
        <div class="card-section">
            <div class="section-title">Hospital Details</div>
            <div class="row g-3">
                <div class="col-md-6 form-floating">
                    <input type="text" class="form-control" id="hospital_name" name="hospital_name" placeholder="Hospital Name" required>
                    <label for="hospital_name"><i class="fa-solid fa-hospital"></i> Hospital Name</label>
                </div>
                <div class="col-md-6 form-floating">
                    <input type="text" class="form-control" id="location" name="location" placeholder="Location" required>
                    <label for="location"><i class="fa-solid fa-location-dot"></i> Location</label>
                </div>
            </div>
        </div>

        <!-- Contact Info -->
        <div class="card-section">
            <div class="section-title">Contact Information</div>
            <div class="row g-3">
                <div class="col-md-4 form-floating">
                    <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Contact Person" required>
                    <label for="contact_person"><i class="fa-solid fa-user"></i> Contact Person</label>
                </div>
                <div class="col-md-4 form-floating">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
                    <label for="phone"><i class="fa-solid fa-phone"></i> Phone</label>
                </div>
                <div class="col-md-4 form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    <label for="email"><i class="fa-solid fa-envelope"></i> Email</label>
                </div>
            </div>
        </div>

        <!-- Security Info -->
        <div class="card-section">
            <div class="section-title">Security</div>
            <div class="row g-3">
                <div class="col-md-6 form-floating">
                    <input type="text" class="form-control" id="license_number" name="license_number" placeholder="License Number" required>
                    <label for="license_number"><i class="fa-solid fa-id-card"></i> License Number</label>
                </div>
                <div class="col-md-6 form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <label for="password"><i class="fa-solid fa-lock"></i> Password</label>
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-register w-50 mb-2">
                <i class="fa-solid fa-user-plus"></i> Register Hospital
            </button>
            <a href="index.php" class="btn btn-home w-50">
                <i class="fa-solid fa-house"></i> Back to Home
            </a>
        </div>

    </form>

</div>

</body>
</html>