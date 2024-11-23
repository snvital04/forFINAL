<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    body {
        padding-top: 85px;
        background-color: #22577a
    }
    </style>
</head>
<header class="fixed-top shadow bg-custom">
    <nav class="navbar navbar-expand-lg justify-content-center">
        <h1 class="f-color-blue">
            Welcome Sobremesa Admin
        </h1>

    </nav>
</header>

<body>
    <!-- Sign-Up Form -->
    <div class="row mx-0">
        <div class="col-6 text-center mt-2">
            <img src="images/info/info1.png" class="img-thumbnail w-75" alt="">
        </div>
        <div class="container bg-white rounded col m-5 mt-2 ">

            <form method="post" id="registrationForm" class="p-3 rounded needs-validation" novalidate>
                <h2 class="text-center">Sign Up</h2>
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

                <div class="d-flex justify-content-between mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="terms" required />
                        <label class="form-check-label" for="terms">
                            I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                        </label>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
                </div>

                <!-- Social Media Sign Up -->
                <div class="social-sign-up text-center mt-3">
                    <p>or sign up with</p>
                    <a class="btn btn-facebook social-btn"><i class="fa fa-facebook"></i> Sign Up with
                        Facebook</a>
                    <a class="btn btn-google social-btn"><i class="fa fa-google"></i> Sign Up with Google</a>
                </div>

                <div class="text-center mt-3">
                    <p>Already have an account? <a href="login.php">Log in</a></p>
                </div>
            </form>
        </div>
    </div>
    <script src="js/register.js"></script>

</body>


</html>