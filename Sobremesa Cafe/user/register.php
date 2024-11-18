<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
    /* Custom Styles */
    body {}

    .container {
        max-width: 600px;
        margin-top: 50px;
    }

    .form-check-label {
        font-size: 14px;
    }

    .social-sign-up {
        text-align: center;
        margin-top: 20px;
    }

    .social-btn {
        font-size: 14px;
        margin: 5px;
        padding: 10px;
    }

    .btn-facebook {
        background-color: #4267B2;
        color: white;
    }

    .btn-google {
        background-color: #db4437;
        color: white;
    }
    </style>
</head>

<body>
    <?php   
    include 'header.php';
    ?>
    <section>
        <div class="container shadow py-3">
            <!-- Sign-Up Form -->
            <h2 class="text-center mb-4">Sign Up</h2>
            <form method="post" action="php/reg.php" id="registrationForm">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" id="firstName" class="form-control" name="firstName" placeholder="First Name"
                            value="" required />
                    </div>
                    <div class="col-md-6 mb-3">
                        <input type="text" id="lastName" class="form-control" name="lastName" placeholder="Last Name"
                            value="" required />
                    </div>
                </div>

                <div class="mb-3">
                    <input type="email" id="email" class="form-control" name="email" placeholder="Email Address"
                        value="" required />
                </div>

                <div class="mb-3">
                    <input type="text" id="phone" class="form-control" name="phone" placeholder="Phone Number" value=""
                        required />
                </div>

                <div class="mb-3">
                    <input type="text" id="username" class="form-control" name="username" placeholder="username"
                        value="" required />
                </div>

                <div class="mb-3">
                    <input type="password" id="password" class="form-control" name="password" placeholder="New Password"
                        required />
                </div>

                <div class="mb-3">
                    <input type="password" id="confirmPassword" class="form-control" name="confirmPassword"
                        placeholder="Confirm Password" required />
                </div>

                <div class="form-outline mb-3">
                    <input type="date" id="birthdate" class="form-control" name="birthdate" value="" required />
                </div>

                <div class="d-md-flex justify-content-start align-items-center mb-4">
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

                <div class="d-flex justify-content-between mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="terms" required />
                        <label class="form-check-label" for="terms">
                            I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                        </label>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
                </div>
            </form>

            <!-- Social Media Sign Up -->
            <div class="social-sign-up">
                <p>or sign up with</p>
                <button class="btn btn-facebook social-btn"><i class="fa fa-facebook"></i> Sign Up with
                    Facebook</button>
                <button class="btn btn-google social-btn"><i class="fa fa-google"></i> Sign Up with Google</button>
            </div>

            <div class="text-center mt-3">
                <p>Already have an account? <a href="include_php/login.php">Log in</a></p>
            </div>
        </div>

    </section>

    <!-- Bootstrap JS and Dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
</body>

</html>