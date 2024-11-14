<?php
include __DIR__ . '/../../db/dbcon.php';
include 'session.php';

// Handle image upload
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES['image'])) {

  // Prepare the image for insertion
  $userCheckStmt = $conn->prepare("SELECT COUNT(*) FROM tbuser WHERE username = ?");
  $userCheckStmt->execute([$_SESSION['username']]);

  // Define the target directory for image uploads
  $targetDir = "image_upload/";

  // Get the file extension of the uploaded image
  $fileExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

  // Set the target file name to "profile_pic" with the original file extension
  $targetFile = $targetDir . "profile_pic." . $fileExtension;

  // Check if the uploads directory exists, if not create it
  if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true);
  }

  // Move the uploaded file to the target directory
  if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
    // Prepare the SQL statement
    $imageData = file_get_contents($targetFile);
    $imageType = $_FILES['image']['type'];

    if ($userCheckStmt->fetchColumn() > 0) {
      $updateStmt = $conn->prepare("UPDATE tbuser SET image = ?, image_type = ? WHERE username = ?");
      if ($updateStmt->execute([$targetFile, $imageType, $_SESSION['username']])) {
        // Update session variable if username was changed
        $_SESSION['image'] = $targetFile;
        $_SESSION['image_type'] = $imageType;
        $_SESSION['successMessage'] = "Profile picture updated successfully!";
        if ($user) {
          // Set the appropriate headers
          header("Content-Type: image/jpeg"); // Change this based on your image type
          echo $user['image']; // Output the image data
        } else {
          // Handle case where no image is found
          echo "No image found.";
        }
        header("Location: ../profile.php");
        exit(); // Ensure to exit after redirect
      } else {
        $_SESSION['errorMessage'] = "Error updating profile. Please try again.";
      }
    } else {
      $stmt = $conn->prepare("INSERT INTO images (image, image_type) VALUES (?, ?)");
      if ($stmt->execute([$imageData, $imageType])) {
        $_SESSION['image_profile'] = $targetFile; // Store image path in session
      } else {
        echo "Error inserting image into database.";
      }
    }
  } else {
    echo "Error uploading file.";
  }
}