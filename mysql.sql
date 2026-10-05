-- CREATE DATABASE
CREATE DATABASE IF NOT EXISTS bloodsync_db;
USE bloodsync_db;

-- 1. ADMIN TABLE
CREATE TABLE admin(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(100)
);

-- 2. DONOR TABLE
CREATE TABLE donor(
    donor_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    age INT,
    gender VARCHAR(10),
    blood_group VARCHAR(5),
    phone VARCHAR(15),
    email VARCHAR(100),
    address TEXT,
    last_donation DATE,
    password VARCHAR(100)
);

-- 3. HOSPITAL TABLE
CREATE TABLE hospital(
    hospital_id INT AUTO_INCREMENT PRIMARY KEY,
    hospital_name VARCHAR(100),
    location VARCHAR(100),
    contact_person VARCHAR(100),
    phone VARCHAR(15),
    email VARCHAR(100),
    license_number VARCHAR(50),
    password VARCHAR(100),
    status VARCHAR(20) DEFAULT 'Pending'
);

-- 4. BLOOD STOCK TABLE
CREATE TABLE blood_stock(
    stock_id INT AUTO_INCREMENT PRIMARY KEY,
    blood_group VARCHAR(5),
    units INT,
    donation_date DATE,
    expiry_date DATE,
    donor_id INT
);

-- 5. BLOOD REQUEST TABLE
CREATE TABLE blood_request(
    request_id INT AUTO_INCREMENT PRIMARY KEY,
    hospital_id INT,
    blood_group VARCHAR(5),
    units_required INT,
    patient_name VARCHAR(100),
    emergency_level VARCHAR(20),
    required_date DATE,
    status VARCHAR(20) DEFAULT 'Pending'
);

-- 6. DONATION HISTORY TABLE
CREATE TABLE donation_history(
    history_id INT AUTO_INCREMENT PRIMARY KEY,
    donor_id INT,
    blood_group VARCHAR(5),
    units INT,
    donation_date DATE
);

-- 7. NOTIFICATIONS TABLE
CREATE TABLE notifications(
    id INT AUTO_INCREMENT PRIMARY KEY,
    message TEXT,
    user_type VARCHAR(50),
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);