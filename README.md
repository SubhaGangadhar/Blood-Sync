# 🩸 Blood Sync

Blood Sync is a web-based Blood Donation Management System developed using PHP and MySQL. The system helps manage blood donors, hospitals, blood requests, emergency requests, and blood availability through a centralized platform.

## 📌 Project Overview

Blood Sync is designed to make blood donation and blood searching easier and more organized.

The system provides separate functionality for donors and hospitals and allows users to search for available blood and submit requests when blood is required.

## ✨ Features

### 👤 Donor Management
- Donor registration
- Donor login
- Donor profile management
- Blood group information
- Donor information management

### 🏥 Hospital Management
- Hospital registration
- Hospital login
- Hospital information management
- Blood requirement/request management

### 🩸 Blood Search
- Search for blood based on blood group
- Find available blood information
- View relevant donor/hospital information

### 🚨 Emergency Blood Requests
- Submit emergency blood requests
- Process emergency requests
- Manage urgent blood requirements

### 🔐 Authentication
- User login
- Logout functionality
- Forgot password
- Password reset functionality

### 🗄️ Database
- MySQL database
- Database configuration
- SQL file included for database setup

## 🛠️ Technologies Used

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP
- **Database:** MySQL
- **Web Server:** Apache
- **Development Environment:** XAMPP
- **Version Control:** GitHub

## 📂 Project Structure

```text
Blood-Sync/
│
├── admin/                         # Admin-related files
├── config/                        # Database configuration
├── css/                           # CSS stylesheets
├── database/                      # Database SQL file
│   └── mysql.sql
├── donor/                         # Donor-related functionality
├── hospital/                      # Hospital-related functionality
├── images/                        # Project images
├── includes/                      # Common PHP files
├── js/                            # JavaScript files
│
├── donor_register.php             # Donor registration
├── donor_register_process.php     # Donor registration processing
├── emergency_process.php          # Emergency request processing
├── emergency_request.php          # Emergency blood request
├── forgot_password.php            # Forgot password
├── hospital_register.php           # Hospital registration
├── hospital_register_process.php   # Hospital registration processing
├── index.php                      # Homepage
├── login.php                      # Login page
├── login_process.php              # Login processing
├── logout.php                     # Logout
├── reset_password.php              # Password reset
└── search_blood.php               # Blood search
