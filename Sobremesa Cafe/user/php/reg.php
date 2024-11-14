<?php
include __DIR__ . '/../../db/dbcon.php';

// Initialize error message variable
$error_message = "";
$count = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstName = trim($_POST["fname"]);
  $lastName = trim($_POST["lname"]);
  $birthDay = trim($_POST["bday"]);
  $username = trim($_POST['uname']);
  $password = trim($_POST['pword']);

  // Check if any required field is empty
  if (empty($firstName) || empty($lastName) || empty($birthDay) || empty($username) || empty($password)) {
    $error_message = "Error: All fields are required.";
  } else {
    // Check if the username already exists
    $pdoQuery = "SELECT COUNT(*) FROM tbuser WHERE username = ?";
    $pdoResult = $conn->prepare($pdoQuery);
    $pdoResult->execute([$username]);

    $count = $pdoResult->fetchColumn(); // Fetch the count directly

    if ($count > 0) {
      $error_message = "Error: Username already exists. Please choose another one.";
    } else {
      // Hash the password
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      // Insert new user into the database
      $pdoQuery = 'INSERT INTO tbuser (username, firstname, lastname, birthday, password) VALUES (?, ?, ?, ?, ?)';
      $pdoResult = $conn->prepare($pdoQuery);
      $pdoExec = $pdoResult->execute([
        $username,
        $firstName,
        $lastName,
        $birthDay,
        $hashedPassword,
      ]);

      if ($pdoExec) {
        header("Location: ../index.php?showLoginModal=true");


        exit(); // Ensure no further code is executed after the redirect
      } else {
        $error_message = "Error: Data could not be inserted.";
      }
    }
  }
}