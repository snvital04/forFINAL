<?php
include 'session.php';
include __DIR__ . '../../../db/dbcon.php';

$errors = [];
$loginkey = $PassWord ="";
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input and trim whitespace
    if (empty($_POST["loginkey"])) {
        $errors[] = "Email is required.";
    } else {
        $email = trim($_POST["loginkey"]);
    }

    if (empty($_POST["pword"])) {
        $errors[] = "Password is required.";
    } else {
        $password = trim($_POST["pword"]);
    }

    // Check if there are no errors
    if (count($errors) === 0) {
        // Prepare SQL query to check credentials
        $stmt = $conn->prepare("SELECT * FROM Userinfo WHERE EmailAddress = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Check if the user exists
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Verify the password (assuming you have hashed the password)
            // If you haven't hashed passwords, you should implement that for security
            // if (password_verify($password, $user['Password'])) {
            //     // Set session variables
                $_SESSION['user_id'] = $user['UserId'];
                $_SESSION['email'] = $user['EmailAddress'];
                $_SESSION['verified'] = $user['VerifiedUser'];

                // Redirect to a welcome page or dashboard
                header("Location: ../index.php");
                exit();
            } else {
                $errors[] = "Invalid password.";
            }
        // } else {
        //     $errors[] = "No user found with that email.";
        // }
    }

    // Display errors
    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
}