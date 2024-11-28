<?php 
include __DIR__ . '/db/dbcon.php'; // Database connection file

$error_message = "";
$error_password = "";
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect input values
    $firstName = isset($_POST['firstName']) ? trim($_POST['firstName']) : "";
    $lastName = isset($_POST['lastName']) ? trim($_POST['lastName']) : "";
    $birthdate = isset($_POST['birthdate']) ? trim($_POST['birthdate']) : "";
    $email = isset($_POST['email']) ? trim($_POST['email']) : "";
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : "";
    $gender = isset($_POST['gender']) ? trim($_POST['gender']) : "";
    $username = isset($_POST['username']) ? trim($_POST['username']) : "";
    $password = isset($_POST['password']) ? trim($_POST['password']) : "";
    $confirmPassword = isset($_POST['confirmPassword']) ? trim($_POST['confirmPassword']) : "";
    $role = isset($_POST['roleSelect']) ? trim($_POST['roleSelect']) : "6"; // Default to User

    // Additional seller fields (only if role is Seller)
    $businessName = isset($_POST['businessName']) ? trim($_POST['businessName']) : "";
    $businessLicense = isset($_POST['businessLicense']) ? trim($_POST['businessLicense']) : "";
    $businessAddress = isset($_POST['businessAddress']) ? trim($_POST['businessAddress']) : "";
    $businessPhone = isset($_POST['businessPhone']) ? trim($_POST['businessPhone']) : "";

    // Password mismatch check
    if ($password !== $confirmPassword) {
        $error_password = "The password does not match.";
    } else {
        // Check if email already exists
        $stmtemail = $conn->prepare("SELECT * FROM Userinfo WHERE EmailAddress = :email");
        $stmtemail->bindParam(':email', $email);
        $stmtemail->execute();
        if ($stmtemail->rowCount() > 0) {
            $error_message = "The email already exists.";
        } else {
            // Check if username already exists
            $stmtuser = $conn->prepare("SELECT * FROM UserAccess WHERE username = :username");
            $stmtuser->bindParam(':username', $username);
            $stmtuser->execute();
            if ($stmtuser->rowCount() > 0) {
                $error_message = "The username already exists.";
            } else {
                // Insert user information into Userinfo table
                $sql = "INSERT INTO Userinfo (FirstName, LastName, Birthdate, EmailAddress, PhoneNumber, Address, Gender, DateVerified, VerifiedUser) 
                        VALUES (:firstName, :lastName, :birthdate, :email, :phone, '', :gender, NULL, 0)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':firstName', $firstName);
                $stmt->bindParam(':lastName', $lastName);
                $stmt->bindParam(':birthdate', $birthdate);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':gender', $gender);

                if ($stmt->execute()) {
                    $lastInsertId = $conn->lastInsertId();
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    // Insert into UserAccess table
                    $sqlAccess = "INSERT INTO UserAccess (UserId, Username, Password, Active, DateCreated)
                                  VALUES (:userId, :username, :password, 1, NOW())";
                    $stmtAccess = $conn->prepare($sqlAccess);
                    $stmtAccess->bindParam(':userId', $lastInsertId);
                    $stmtAccess->bindParam(':username', $username);
                    $stmtAccess->bindParam(':password', $hashedPassword);

                    // If user is a seller, insert seller details
                    if ($role == "5") { // Seller role
                        // Ensure that the seller fields are provided before inserting
                        if (!empty($businessName) && !empty($businessLicense) && !empty($businessPhone)) {
                            $sqlSeller = "INSERT INTO Sellers (UserId, BusinessName, BusinessLicense, BusinessAddress, BusinessPhone)
                                          VALUES (:userId, :businessName, :businessLicense, :businessAddress, :businessPhone)";
                            $stmtSeller = $conn->prepare($sqlSeller);
                            $stmtSeller->bindParam(':userId', $lastInsertId);
                            $stmtSeller->bindParam(':businessName', $businessName);
                            $stmtSeller->bindParam(':businessLicense', $businessLicense);
                            $stmtSeller->bindParam(':businessAddress', $businessAddress);
                            $stmtSeller->bindParam(':businessPhone', $businessPhone);
                            $stmtSeller->execute();
                        } else {
                            $error_message = "Seller details (Business Name, License, and Phone) are required.";
                        }
                    }

                    // Execute UserAccess insertion
                    if ($stmtAccess->execute()) {
                        $success_message = "Registration successful!";
                        header("Location: login.php"); // Redirect to login page after successful registration
                        exit;
                    } else {
                        $error_message = "Error: Could not insert into UserAccess table.";
                    }
                } else {
                    $error_message = "Error: Could not insert into Userinfo table.";
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header class="fixed-top shadow bg-custom">
        <nav class="navbar navbar-expand-lg justify-content-center">
            <div class="px-0 px-sm-5">
                <h1>
                    <a class="navbar-brand " href="index.php">
                        <img src="images/icon/logo.jpg" class="img-fluid" style="width:200px;" alt="Logo">
                    </a>
                </h1>
            </div>
        </nav>
    </header>

    <!-- Sign-Up Form -->
    <div class="row mx-0">
        <div class="col-6 text-center mt-2">
            <img src="images/info/info1.png" class="img-thumbnail w-75" alt="">
        </div>
        <div class="container bg-white rounded col m-5 mt-2 ">
            <h2 class="text-center">Sign Up</h2>

            <div class="mb-4 position-relative">
                <select class="form-select" id="roleSelect" aria-label="Select Role">
                    <option value="6">User</option>
                    <option value="8">Admin</option>
                    <option value="7">Seller</option>
                </select>
            </div>

            <!-- Dynamic fields for Seller role -->
            <div id="sellerFields" style="display:none;">
                <div class="mb-4 position-relative">
                    <input type="text" required id="businessName" class="form-control" name="businessName"
                        placeholder="Business Name" />
                </div>
                <div class="mb-4 position-relative">
                    <input type="text" required id="businessLicense" class="form-control" name="businessLicense"
                        placeholder="Business License Number" />
                </div>
                <div class="mb-4 position-relative">
                    <textarea class="form-control" id="businessAddress" name="businessAddress"
                        placeholder="Business Address"></textarea>
                </div>
                <div class="mb-4 position-relative">
                    <input type="text" id="businessPhone" class="form-control" name="businessPhone"
                        placeholder="Business Phone Number" />
                </div>

                <!-- Next button to proceed to user details -->
                <div class="d-flex justify-content-center mb-3">
                    <button type="button" id="nextBtn" class="btn btn-primary btn-lg">Next</button>
                </div>
            </div>

            <!-- User details form -->
            <form method="post" id="registrationForm" class="p-3 rounded needs-validation" novalidate>
                <!-- User form fields (initially visible) -->
                <div id="userDetails">
                    <div class="row">
                        <div class="col-md-6 mb-3 position-relative">
                            <input type="text" id="validationServer01" required class="form-control" name="firstName"
                                placeholder="First Name" />
                        </div>
                        <div class="col-md-6 mb-3 position-relative">
                            <input type="text" required id="lastName" class="form-control" name="lastName"
                                placeholder="Last Name" />
                        </div>
                    </div>

                    <div class="mb-3 position-relative">
                        <input type="email" required id="email" class="form-control" name="email"
                            placeholder="Email Address" />
                    </div>

                    <div class="mb-3 position-relative">
                        <input type="text" required id="phone" class="form-control" name="phone"
                            placeholder="Phone Number" />
                    </div>
                    <div class="mb-3 position-relative">
                        <input type="text" required id="username" class="form-control" name="username"
                            placeholder="Username" />
                    </div>

                    <div class="mb-3 position-relative">
                        <input type="password" required id="password" class="form-control" name="password"
                            placeholder="New Password" />
                    </div>

                    <div class="mb-3 position-relative">
                        <input type="password" required id="confirmPassword" class="form-control" name="confirmPassword"
                            placeholder="Confirm Password" />
                    </div>

                    <div class="form-outline mb-3">
                        <input type="date" required id="birthdate" class="form-control" name="birthdate" />
                    </div>

                    <div class="d-md-flex justify-content-start align-items-center mb-4 ">
                        <h6 class="mb-0 me-4">Gender:</h6>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="1" required />
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="2" required />
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="other" value="3" required />
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
                    </div>

                    <!-- Social Media Sign Up -->
                    <div class="social-sign-up text-center mt-3">
                        <p>or sign up with</p>
                        <a class="btn btn-facebook social-btn"><i class="fa fa-facebook"></i> Sign Up with Facebook</a>
                        <a class="btn btn-google social-btn"><i class="fa fa-google"></i> Sign Up with Google</a>
                    </div>

                    <div class="text-center mt-3">
                        <p>Already have an account? <a href="login.php">Log in</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
    // Show seller form fields when "Seller" role is selected
    document.getElementById("roleSelect").addEventListener("change", function() {
        const sellerFields = document.getElementById("sellerFields");
        const userDetails = document.getElementById("userDetails");
        if (this.value == "5") {
            sellerFields.style.display = "block";
            userDetails.style.display = "none"; // Hide user details form if seller selected
        } else {
            sellerFields.style.display = "none";
            userDetails.style.display = "block"; // Show user details form if not seller
        }
    });

    // Proceed to user details when "Next" button is clicked
    document.getElementById("nextBtn").addEventListener("click", function() {
        // Validate seller form before proceeding
        const businessName = document.getElementById("businessName").value;
        const businessLicense = document.getElementById("businessLicense").value;
        const businessPhone = document.getElementById("businessPhone").value;

        if (businessName && businessLicense && businessPhone) {
            document.getElementById("sellerFields").style.display = "none";
            document.getElementById("userDetails").style.display = "block";
        } else {
            alert("Please complete all seller details before proceeding.");
        }
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>