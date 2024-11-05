<?php
session_start();
include('dbcon.php');

// Initialize error message variable
$error_message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Email = trim($_POST['email']); // Trim whitespace
  $PassWord = trim($_POST['pword']); // Trim whitespace

  // Query to select the user by username or email
  $pdoQuery = 'SELECT * FROM tbuser WHERE email = :email';
  $pdoResult = $conn->prepare($pdoQuery);
  $pdoResult->execute([":email" => $Email]);

  // Fetch the user data
  $email = $pdoResult->fetch(PDO::FETCH_ASSOC);

  if ($email && password_verify($PassWord, $email['email'])) {
    // Password is correct, set session and redirect to dashboard
    $_SESSION['id'] = $Email['id']; // Store Email ID in session
    $_SESSION['fname'] = $Email['firstname'];
    $_SESSION['lname'] = $Email['lastname'];

    header("Location: ../index.php");
    exit(); // Ensure no further code is executed after the redirect
  } else {
    $error_message = "Error: Invalid username or password.";
  }
}
