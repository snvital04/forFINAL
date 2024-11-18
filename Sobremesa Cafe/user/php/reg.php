<?php
// Initialize variables
include("../../db/dbcon.php");

$firstName = isset($_POST['firstName']) ? trim($_POST['firstName']) : "";
$lastName = isset($_POST['lastName']) ? trim($_POST['lastName']) : "";
$birthdate = isset($_POST['birthdate']) ? trim($_POST['birthdate']) : "";
$email = isset($_POST['email']) ? trim($_POST['email']) : "";
$phone = isset($_POST['phone']) ? trim($_POST['phone']) : "";
$gender = isset($_POST['gender']) ? trim($_POST['gender']) : "";
$username = isset($_POST['username']) ? trim($_POST['username']) : "";
$password = isset($_POST['password']) ? trim($_POST['password']) : "";
$confirmPassword = isset($_POST['confirmPassword']) ? trim($_POST['confirmPassword']) : "";
$errors = [];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input and trim whitespace
    if (empty($firstName)) {
        $errors[] = "First name is required.";
    }

    if (empty($lastName)) {
        $errors[] = "Last name is required.";
    }

    if (empty($birthdate)) {
        $errors[] = "Birthdate is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    }

    if (empty($phone)) {
        $errors[] = "Phone number is required.";
    }


    if (empty($gender)) {
        $errors[] = "Gender is required.";
    }

    if (empty($username)) {
        $errors[] = "Username is required.";
    }

    // Validate password
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }

    // Validate confirm password
    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match.";
    }

    // Check if there are no errors
    if (count($errors) === 0) {
        // Check if the email already exists in Userinfo table
        $stmt = $conn->prepare("SELECT * FROM Userinfo WHERE EmailAddress = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $errors[] = "Email already exists.";
        }

        // Check if the gender exists in the LookUp table
        $stmt = $conn->prepare("SELECT * FROM LookUp WHERE LookUpId = :gender");
        $stmt->bindParam(':gender', $gender);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            $errors[] = "Invalid gender selection.";
        }

        // If no errors, proceed to insert into Userinfo and UserAccess tables
        if (count($errors) === 0) {
            // Hash the password before storing it
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Prepare SQL query to insert user info into Userinfo table
            $sql = "INSERT INTO Userinfo (FirstName, LastName, Birthdate, EmailAddress, PhoneNumber, Address, Gender, DateVerified, VerifiedUser) 
                    VALUES (:firstName, :lastName, :birthdate, :email, :phone, :address, :gender, NULL, 0)";
            
            // Prepare statement for Userinfo table
            $stmt = $conn->prepare($sql);

            // Bind parameters for Userinfo table
            $stmt->bindParam(':firstName', $firstName);
            $stmt->bindParam(':lastName', $lastName);
            $stmt->bindParam(':birthdate', $birthdate);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':gender', $gender);

            // Execute the query to insert into Userinfo
            if ($stmt->execute()) {
                // Get the UserId of the newly inserted user
                $lastInsertId = $conn->lastInsertId();

                // Now insert the user credentials into UserAccess table
                $sqlAccess = "INSERT INTO UserAccess (UserId, Username, Password, Active, DateCreated)
                              VALUES (:userId, :username, :password, 1, NOW())";
                
                // Prepare statement for UserAccess table
                $stmtAccess = $conn->prepare($sqlAccess);

                // Bind parameters for UserAccess table
                $stmtAccess->bindParam(':userId', $lastInsertId);
                $stmtAccess->bindParam(':username', $username);
                $stmtAccess->bindParam(':password', $hashedPassword);

                // Execute the query to insert into UserAccess
                if ($stmtAccess->execute()) {
                    // Registration successful, redirect user
                    echo "Registration successful!";
                    header("Location: ../index.php");
                    exit; // Always use exit after header redirection
                } else {
                    $errors[] = "Error: Could not insert into UserAccess table.";
                }
            } else {
                $errors[] = "Error: Could not execute the query to insert into Userinfo.";
            }
        }
    }

    // Display errors
    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
}
?>