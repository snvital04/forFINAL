<?php

include 'user/php/session.php';
include 'db/dbcon.php';

$errors_pass = '';
$errors_user = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values from the form
    $loginkey = trim($_POST['loginkey']);
    $password = trim($_POST['pword']);
    
    // Prepare query to check if the email or username exists
    $stmt = $conn->prepare("SELECT * FROM useraccess AS us INNER JOIN userinfo AS ui ON us.UserId = ui.UserId WHERE (us.Username = ? OR ui.EmailAddress =?)");
    $stmt->execute([$loginkey,$loginkey]);
    // Check if any user is found
    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $storedHash = $user['Password']; 
        // Verify the password
        // if (password_verify($password, $storedHash)) { // Ensure password is stored securely
            $_SESSION['user_id'] = $user['UserId'];
            $_SESSION['email'] = $user['EmailAddress'];
            $_SESSION['username'] = $user['Username'];
            $_SESSION['firstname'] = $user['FirstName'];
            $_SESSION['lastname'] = $user['LastName'];
            $_SESSION['birthday'] = $user['Birthdate'];
            $_SESSION['address'] = $user['Address'];
            $_SESSION['verified'] = $user['VerifiedUser'];

            // Redirect to the home page or dashboard
            header("Location: index.php");
            exit();
        // } else {
        //     $errors_pass = "Invalid password.";
        // }
    } else {
        $errors_user = "No user found with this email or username.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                        <img src="images/icon/logo.jpg" class="img-fluid lazy entered loaded rounded-pill"
                            data-ll-status="loaded" style="width:200px;" alt="Sobremesa Cafe/user Logo">
                    </a>

                </h1>
            </div>
        </nav>
    </header>

    <div class="row mx-0">
        <!-- Login Form -->
        <div class="container text-center rounded col m-5 mt-2">

            <!-- Start of the form -->
            <form method="POST" class="bg-white p-3 rounded needs-validation" id="validateForm" novalidate>
                <h2 class="text-center fs-1">Login</h2>
                <p class="text-center fs-5">Please enter your Email and password!</p>
                <small class="text-danger ">
                    <?php if (!empty($errors_user)) { echo $errors_user; } ?>
                </small>
                <div class="form-outline form-white mb-4 position-relative">
                    <input type="text" id="loginkey" placeholder="Username or Email" name="loginkey"
                        class="form-control form-control-lg" required />
                    <div class="invalid-feedback">
                        Please enter your username or email.
                    </div>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <div class="form-outline form-white mb-4 position-relative">
                    <small class="text-danger ">
                        <?php if (!empty($errors_pass)) { echo $errors_pass; } ?>
                    </small>
                    <input type="password" id="pword" placeholder="Password" name="pword"
                        class="form-control form-control-lg" required />
                    <div class="invalid-feedback">
                        Please enter your password.
                    </div>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>

                <p class="small mb-5 pb-lg-2"><a href="#!">Forgot password?</a></p>

                <button class="btn btn-lg px-5 btn-primary" type="submit">Login</button>

                <div class="text-center mt-3">
                    <p class="mb-0">Don't have an account?
                        <a class="" href="register.php">Register</a>
                    </p>
                </div>
            </form>
        </div>

        <div class="col-6 text-center mt-2">
            <img src="images/info/info.png" class="img-thumbnail w-75" alt="">
        </div>

    </div>

    <script src="js/login.js"></script>
</body>

</html>