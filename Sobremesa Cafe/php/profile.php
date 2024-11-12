<?php
session_start();
include __DIR__ . '/../db/dbcon.php';

// Initialize messages
$successMessage = "";
$errorMessage = "";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: ../index.php");
  exit();
}

// Get user ID from session
$userId = $_SESSION['user_id'];

// Fetch user data from the database
$stmt = $conn->prepare("SELECT firstname, lastname, birthday, username, image_path FROM tbuser WHERE id = ?");
$stmt->execute([$userId]);

if ($stmt->rowCount() > 0) {
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  $firstname = htmlspecialchars($user['firstname']);
  $lastname = htmlspecialchars($user['lastname']);
  $birthday = htmlspecialchars($user['birthday']);
  $username = htmlspecialchars($user['username']);
  $uploaded_image = htmlspecialchars($user['image_path']); // Fetch the existing image path
} else {
  header("Location: ../index.php");
  exit();
}

// Handle profile update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_profile'])) {
  // Retrieve form data
  $firstName = htmlspecialchars(trim($_POST['firstname']));
  $lastName = htmlspecialchars(trim($_POST['lastname']));
  $birthday = htmlspecialchars(trim($_POST['bday']));
  $username = htmlspecialchars(trim($_POST['username']));

  // Check if the username already exists
  $userCheckStmt = $conn->prepare("SELECT COUNT(*) FROM tbuser WHERE username = ? AND id != ?");
  $userCheckStmt->execute([$username, $userId]);

  if ($userCheckStmt->fetchColumn() > 0) {
    $errorMessage = "Username already used.";
  } else {
    // Prepare and execute the update statement
    $updateStmt = $conn->prepare("UPDATE tbuser SET firstname = ?, lastname = ?, birthday = ?, username = ? WHERE id = ?");

    if ($updateStmt->execute([$firstName, $lastName, $birthday, $username, $userId])) {
      // Update session variable if username was changed
      $_SESSION['username'] = $username;
      $successMessage = "Profile updated successfully!";
      header("Location: ../profile.php");
      exit(); // Ensure to exit after redirect
    } else {
      $errorMessage = "Error updating profile. Please try again.";
    }
  }
}

// Handle image upload
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES['image'])) {
  // Check if the file was uploaded without errors
  if ($_FILES['image']['error'] == 0) {
    $uploads_dir = __DIR__ . '/image_upload/profile'; // Directory to save uploaded images
    $tmp_name = $_FILES['image']['tmp_name'];

    // Rename the uploaded file to "profilepicture" with the same extension
    $file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $new_file_name = "profilepicture." . $file_extension; // New file name
    $upload_file = "$uploads_dir/$new_file_name";

    // Create uploads directory if it doesn't exist
    if (!is_dir($uploads_dir)) {
      mkdir($uploads_dir, 0755, true);
    }

    // Validate file type
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($_FILES['image']['type'], $allowed_types)) {
      $errorMessage = "Invalid file type.";
    } else {
      // Move the uploaded file to the desired directory
      if (move_uploaded_file($tmp_name, $upload_file)) {
        // Delete the old image file if it exists
        if (!empty($uploaded_image) && file_exists(__DIR__ . '/../' . $uploaded_image)) {
          unlink(__DIR__ . '/../' . $uploaded_image); // Remove the old image
        }

        // Update the user's image path in the database
        $imageUpdateStmt = $conn->prepare("UPDATE tbuser SET image_path = ? WHERE id = ?");
        if ($imageUpdateStmt->execute(['image_upload/profile/' . $new_file_name, $userId])) {
          $successMessage = "Image uploaded successfully!";
          header("Location: ../profile.php");
          exit(); // Ensure to exit after redirect
        } else {
          $errorMessage = "Error saving image information.";
        }
      } else {
        $errorMessage = "Error uploading the file.";
      }
    }
  } else {
    $errorMessage = "Error: " . $_FILES['image']['error'];
  }
}
