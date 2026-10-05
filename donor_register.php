<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Donor Registration | Blood Sync</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #ff4d4d, #8b0000);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

/* Card container */
.registration-card {
    background: #fff;
    border-radius: 20px;
    padding: 40px 35px;
    max-width: 900px;
    width: 100%;
    box-shadow: 0 20px 50px rgba(0,0,0,0.3);
}

/* Card Sections */
.card-section {
    background: #f8f9fa;
    padding: 20px 20px 10px 20px;
    border-radius: 15px;
    margin-bottom: 25px;
}

/* Floating label style */
.form-floating input,
.form-floating select,
.form-floating textarea {
    border-radius: 10px;
    height: 50px;
    box-shadow: inset 0 2px 4px rgba(0,0,0,0.05);
    border: 1px solid #ccc;
    transition: 0.3s;
}
.form-floating input:focus,
.form-floating select:focus,
.form-floating textarea:focus {
    border-color: #b71c1c;
    box-shadow: 0 0 10px rgba(183,28,28,0.2);
}
.form-floating label {
    font-weight: 500;
}

/* Section Titles */
.section-title {
    font-weight: 600;
    color: #b71c1c;
    margin-bottom: 15px;
    font-size: 18px;
}

/* Buttons */
.btn-register {
    background: #b71c1c;
    color: #fff;
    border-radius: 10px;
    font-weight: 600;
    height: 50px;
    transition: 0.3s;
}
.btn-register:hover {
    background: #7f0000;
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

.registration-title {
    text-align: center;
    font-size: 32px;
    font-weight: 700;
    color: #b71c1c;
    margin-bottom: 30px;
}

@media(max-width:768px){
    .registration-card { padding: 30px 20px; }
    .registration-title { font-size: 28px; }
}
</style>
</head>
<body>

<div class="registration-card">

    <h2 class="registration-title"><i class="fa-solid fa-user-plus"></i> Donor Registration</h2>

    <form action="donor_register_process.php" method="POST">

        <!-- Personal Info -->
        <div class="card-section">
            <div class="section-title">Personal Information</div>
            <div class="row g-3">
                <div class="col-md-6 form-floating">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" required>
                    <label for="name"><i class="fa-solid fa-user"></i> Full Name</label>
                </div>
                <div class="col-md-3 form-floating">
                    <input type="number" class="form-control" name="age" id="age" placeholder="Age" required>
                    <label for="age"><i class="fa-solid fa-calendar"></i> Age</label>
                </div>
                <div class="col-md-3 form-floating">
                    <select class="form-control" name="gender" id="gender">
                        <option value="" disabled selected>Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                    <label for="gender"><i class="fa-solid fa-venus-mars"></i> Gender</label>
                </div>
            </div>
        </div>

        <!-- Contact Info -->
        <div class="card-section">
            <div class="section-title">Contact Information</div>
            <div class="row g-3">
                <div class="col-md-4 form-floating">
                    <select class="form-control" name="blood_group" id="blood_group">
                        <option value="" disabled selected>Blood Group</option>
                        <option>A+</option>
                        <option>A-</option>
                        <option>B+</option>
                        <option>B-</option>
                        <option>O+</option>
                        <option>O-</option>
                        <option>AB+</option>
                        <option>AB-</option>
                    </select>
                    <label for="blood_group"><i class="fa-solid fa-droplet"></i> Blood Group</label>
                </div>
                <div class="col-md-4 form-floating">
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" required>
                    <label for="phone"><i class="fa-solid fa-phone"></i> Phone</label>
                </div>
                <div class="col-md-4 form-floating">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                    <label for="email"><i class="fa-solid fa-envelope"></i> Email</label>
                </div>
            </div>
            <div class="row g-3 mt-3">
                <div class="col-md-6 form-floating">
                    <textarea class="form-control" name="address" id="address" rows="2" placeholder="Address"></textarea>
                    <label for="address"><i class="fa-solid fa-location-dot"></i> Address</label>
                </div>
                <div class="col-md-3 form-floating">
                    <input type="date" class="form-control" name="last_donation" id="last_donation">
                    <label for="last_donation"><i class="fa-solid fa-calendar-days"></i> Last Donation Date</label>
                </div>
                <div class="col-md-3 form-floating">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    <label for="password"><i class="fa-solid fa-lock"></i> Password</label>
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-register w-50 mb-2">
                <i class="fa-solid fa-user-plus"></i> Register Donor
            </button>
            <a href="index.php" class="btn btn-home w-50">
                <i class="fa-solid fa-house"></i> Back to Home
            </a>
        </div>

    </form>

</div>

</body>
</html>