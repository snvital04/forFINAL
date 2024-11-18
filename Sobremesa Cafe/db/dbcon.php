<?php
// Database connection
$dsn = "mysql:host=localhost;dbname=SobremesaCafe;charset=utf8mb4";
$username = "root"; // default username for XAMPP
$password = ""; // default password for XAMPP

try {
    // Create a new PDO instance
    $conn = new PDO($dsn, $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}