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
    <style>
    body {
        padding-top: 85px;
        background-color: #22577a
    }
    </style>
</head>

<body>
    <header class="fixed-top shadow bg-custom">
        <nav class="navbar navbar-expand-lg justify-content-center">
            <h1 class="f-color-blue">
                Welcome Sobremesa Admin
            </h1>

        </nav>
    </header>
    <div class="row mx-0">
        <!-- Login Form -->
        <div class="container text-center rounded col m-5 mt-2">

            <!-- Start of the form -->
            <form method="POST" action="dashboard.php " class="bg-white p-3 rounded needs-validation" id="validateForm"
                novalidate>
                <h2 class="text-center fs-1">Login</h2>
                <p class="text-center fs-5">Please enter your Email and password!</p>

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