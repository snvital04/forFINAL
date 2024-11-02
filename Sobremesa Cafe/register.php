<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        .bg-custom {
            background-color: red;
        }
        .exit-button {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 1000; /* Ensure it stays on top */
        }
    </style>
</head>
<body>
<section class="bg-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="card bg-dark text-white col-12 col-md-8 col-lg-6 col-xl-5" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                    <a class="btn btn-danger exit-button" href="index.php">X</a>
                    <div class="mb-md-5 mt-md-4 pb-5">
                        <form>
                            <h1 class="text-center">Registration Form</h1>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="firstName">First Name</label>
                                <input type="text" id="firstName" class="form-control" required />
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="lastName">Last Name</label>
                                <input type="text" id="lastName" class="form-control" required />
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-outline">
                                        <label class="form-label" for="birthdayDate">Birthday</label>
                                        <input type="date" class="form-control" id="birthdayDate" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Gender:</label><br>
                                        <input type="radio" name="gender" id="femaleGender" value="Female" required />
                                        <label class="form-check-label" for="femaleGender">Female</label>
                                        <input type="radio" name="gender" id="maleGender" value="Male" required />
                                        <label class="form-check-label" for="maleGender">Male</label>
                                </div>
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="emailAddress">Email</label>
                                <input type="email" id="emailAddress" class="form-control form-control-lg" required />
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="phoneNumber">Phone Number</label>
                                <input type="tel" id="phoneNumber" class="form-control form-control-lg" required />
                            </div>
                            <div class="mt-4 pt-2">
                                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                            </div>
                        </form>
                    </div>
                    <div>
                        <p class="mb-0">Already have an account? <a href="login.php" class="text-white-50 fw-bold">Log in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>