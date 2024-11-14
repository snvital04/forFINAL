<?php
include __DIR__ . '/../../db/dbcon.php';
include 'session.php';
// Check if the user is logged in

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['form_id'])) {
    if ($_POST['form_id'] === 'update_info') {
      $username =  $_SESSION['username'];
      $firstName = htmlspecialchars(trim($_POST['firstname']));
      $lastName = htmlspecialchars(trim($_POST['lastname']));
      $birthday = htmlspecialchars(trim($_POST['bday']));
      // Check if the username already exists

      // Prepare and execute the update statement
      $updateStmt = $conn->prepare("UPDATE tbuser SET firstname = ?, lastname = ?, birthday = ? WHERE id = ?");
      if ($updateStmt->execute([$firstName, $lastName, $birthday, $_SESSION['user_id']])) {
        // Update session variable if username was changed
        $_SESSION['firstname'] = $firstName;
        $_SESSION['lastname'] = $lastName;
        $_SESSION['birthday'] = $birthday;
        header("Location: ../profile.php");
        exit(); // Ensure to exit after redirect
      } else {
        $_SESSION['errorMessage'] = "Error updating profile. Please try again.";
      }
    }
    if ($_POST['form_id'] === 'update_username') {
      $username =  htmlspecialchars(trim($_POST['username']));

      $stmt = $conn->prepare("SELECT COUNT(*) FROM tbuser WHERE username = ?");
      $stmt->execute([$username]);

      if ($stmt->fetchColumn() > 0) {
        $error_message = 'username already exist';
        header("Location: ../profile.php");
        exit();
      } else {
        $stmt = $conn->prepare("UPDATE tbuser SET username= ? WHERE id = ?");
        $stmt->execute([$username, $_SESSION['user_id']]);
        $_SESSION['username'] = $username;
        header("Location: ../profile.php");
        exit();
      }
    }
  }
}