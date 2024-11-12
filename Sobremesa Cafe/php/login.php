<?php
session_start();
include('../db/dbcon.php');

// Initialize error message variable
$error_message = "";
$error_userpass = "Error: Invalid username or password.";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Trim whitespace from input
  $loginkey = trim($_POST['loginkey']);
  $PassWord = trim($_POST['pword']);

  // Query to select the user by username or email
  $pdoQuery = 'SELECT * FROM tbuser WHERE username = :username ';
  $pdoResult = $conn->prepare($pdoQuery);
  $pdoResult->execute([
    ":username" => $loginkey,
  ]);

  // Fetch the user data
  $user = $pdoResult->fetch(PDO::FETCH_ASSOC);

  if ($user) {
    // Password is correct, set session and redirect to dashboard
    $_SESSION['user_id'] = $user['id']; // Store user ID in session
    $_SESSION['username'] = $user['username']; // Store username in session
    $_SESSION['fname'] = $user['firstname'];
    $_SESSION['lname'] = $user['lastname'];
    $_SESSION['uploaded_image'] = ($user['image_path']);
    header("Location: ../index.php");
    exit(); // Ensure no further code is executed after the redirect
  } else {
    // Set the error message
    header("Location: ../index.php?showLoginModal=true");
    exit();
    // Optionally, you could redirect back to the login page with an error message
    // header("Location: login.php?error=" . urlencode($error_message));
    // exit();
  }
}

// Optionally, you can display the error message on the login page if needed
if (!empty($error_message)) {
  echo "<div class='error'>$error_message</div>";
}
