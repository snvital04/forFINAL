<?php  
include("php/session.php");
  include 'include_php/cart.php';
$user_id = isset($_SESSION['user_id']); // Store user ID in session
$image_path = isset($_SESSION['image_path']); // Store user ID in session
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@Sobremesa Cafe</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body id="home" class=" bg-body-custom">
    <?php
include 'php/session.php';
$user_id = isset($_SESSION['user_id']); // Store user ID in session
$image_path = isset($_SESSION['image_path']); // Store user ID in session
?>

    <header class="fixed-top shadow bg-custom">
        <nav class="navbar navbar-expand-lg justify-content-center">

            <div class="px-0 px-sm-5">
                <h1>
                    <a class="navbar-brand " href="./index.php">
                        <img src="images/icon/logo.jpg" class="img-fluid lazy entered loaded rounded-pill"
                            data-ll-status="loaded" style="width:200px;" alt="Sobremesa Cafe/user Logo">
                    </a>
                </h1>
            </div>
            <div class="collapse navbar-collapse" id="MainNav">
                <ul class="navbar-nav mx-auto my-3 my-lg-0">

                    <li class="nav-item px-4 fs-5 active">
                        <a class="nav-link f-color" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown px-4 fs-5  active">
                        <a class="nav-link dropdown-toggle f-color" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu f-color" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item f-color" href="#food">Foods</a></li>
                            <li><a class="dropdown-item f-color" href="#Drinks">Drinks</a></li>
                            <li><a class="dropdown-item f-color" href="#Cake">Cake</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item px-4 fs-5">
                        <a class="nav-link f-color" href="#About">About</a>
                    </li>

                </ul>
            </div>

            <div class="ms-lg-auto text-right navbar-content d-none d-lg-block px-5 mx-5 f-color ">
                <div class="d-flex ">

                    <?php if ($user_id): ?>
                    <a type="button" class="btn btn-lg rounded f-color" href="user/addcart.php">
                        <img src="images/icon/cart.png" style="width:40px;height: 40px;" alt="Cart">
                    </a>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="php/image_upload/profile_pic.png" class=" img-thumbnail "
                                style="cursor: pointer; width: 45px; height: 45px;backgroud-color:red ;">
                            <?php echo htmlspecialchars($_SESSION['firstname'] ?? '') . ' ' . htmlspecialchars($_SESSION['lastname'] ?? ''); ?>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="user/profile.php" class="dropdown-item btn btn-lg f-color ">
                                    <?php if (!empty($image_path)): ?>
                                    <!-- Display the profile picture -->
                                    <img src="<?php echo htmlspecialchars($image_path); ?>"
                                        class="rounded-circle border border-dark" alt="Profile Picture"
                                        style="width: 35px; height: 35px;">
                                    <?php else: ?>
                                    <!-- Default profile image -->
                                    <img src="images/icon/profile.png" class="rounded-circle border border-dark"
                                        style="width: 35px; height: 35px;">
                                    <?php endif; ?>
                                    <?php echo htmlspecialchars($_SESSION['firstname'] ?? '') . ' ' . htmlspecialchars($_SESSION['lastname'] ?? ''); ?>
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item btn btn-lg f-color" href="./user/php/logout.php">
                                    <img src="images/icon/logout.png" style="width: 25px;" alt="Logout"> Logout
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </div>


                    <?php else: ?>


                    <div class="d-flex justify-content-center">

                        <a class="btn btn-lg f-color " href="./login.php">
                            Login
                        </a>
                    </div>
                    <div class="d-flex justify-content-center">

                        <!-- Trigger Button for Modal -->
                        <a class="btn btn-lg f-color" href="./register.php">
                            Sign Up
                        </a>

                    </div><?php endif; ?>
                </div>
            </div>

        </nav>
    </header>
    <main class=" mt-4 ">
        <?php
       
    include 'include_php/carousel.php';
    ?>

        <section class=" d-flex text-center flex-column px-5" id="Drinks">
            <h1 class="text-center bg-light f-color-blue py-1">Category</h1>
            <div class=" row bg-dark p-0 m-0 justify-content-center align-items-center">
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <h1>
                            <div class="display-2 text-white fw-bold">Drinks</div>
                            <div class="display-5 text-white">Lorem, ipsum dolor.</div>
                        </h1>
                        <p class="lead my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div>
                            <?php if ($user_id): ?>
                            <a href="user/drinks.php" class="btn btn-secondary hover-button">Shop Now</a>
                            <?php else: ?>
                            <a href="./login.php" class="btn btn-secondary hover-button">Shop Now</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-0 m-0 ">
                    <img class="img-fluid p-0 img-thumbnail border-0" src="./user/images/categories/Coffee.png"
                        alt="Food Image" style="max-width: 100%; height: 700px;">
                </div>
            </div>

        </section>

        <section class="py-5 my-5 d-flex flex-column px-5" id="food" style="max-height:740px">
            <div class="row bg-dark m-0 p-0 justify-content-center align-items-center">
                <div class="col-md-6 p-0">
                    <img class="img-fluid  img-thumbnail p-0 border-0" src="./user/images/categories/food.png"
                        alt="Food Image" style="max-width: 100%; height: 700px;">
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <h1>
                            <div class="display-2 text-white fw-bold">FOOD</div>
                            <div class="display-5 text-white">Lorem, ipsum dolor.</div>
                        </h1>
                        <p class="lead my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div>
                            <?php if ($user_id): ?>
                            <a href="user/food.php" class="btn btn-secondary hover-button">Shop Now</a>
                            <?php else: ?>
                            <a href="./login.php" class="btn btn-secondary hover-button">Shop Now</a>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <section class="my-5 py-5 d-flex text-center flex-column py-0 px-5" id="Cake">
            <div class=" row bg-dark p-0 m-0 justify-content-center align-items-center">
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <h1>
                            <div class="display-2 text-white fw-bold">CAKE</div>
                            <div class="display-5 text-white">Lorem, ipsum dolor.</div>
                        </h1>
                        <p class="lead my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <div>
                            <?php if ($user_id): ?>
                            <a href="user/cake.php" class="btn btn-secondary hover-button">Shop Now</a>
                            <?php else: ?>
                            <a href="./login.php" class="btn btn-secondary hover-button">Shop Now</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 p-0">
                    <img class="img-fluid p-0 img-thumbnail border-0" src="./user/images/categories/cake.png"
                        alt="Food Image" style="max-width: 100%; height: 700px;">
                </div>
            </div>
        </section>

    </main>

    <!--ABOUT  -->
    <footer class="">
        <?php echo htmlspecialchars($_SESSION['role'] ?? '') . ' ' . htmlspecialchars($_SESSION['role'] ?? ''); ?>
        <section id="About">
            <div id="footer-bottom">
                <div class="container-fluid">
                    <div class="row">

                        <div>
                            <h1>About</h1>
                            <h1>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos incidunt est quae iste
                            </h1>
                        </div>
                        <div class="col-md-6 copyright">
                            <p>© 2025 Sobremesa Cafe. All rights reserved.</p>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script src="js/script.js"></script>
    <script src="js/login.js"></script>
    <script src="js/cart.js"></script>
</body>

</html>