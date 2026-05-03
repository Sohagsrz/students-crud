<?php
// Database Configuration
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS student_management";
if (mysqli_query($conn, $sql)) {
    // Database created successfully or already exists
} else {
    die("Error creating database: " . mysqli_error($conn));
}

// Select the database
mysqli_select_db($conn, "student_management");

// Create table if not exists
$create_table_sql = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    registration_no VARCHAR(20) NOT NULL,
    department VARCHAR(50) NOT NULL
)";

if (mysqli_query($conn, $create_table_sql)) {
    // Table created successfully or already exists
} else {
    die("Error creating table: " . mysqli_error($conn));
}
?>
