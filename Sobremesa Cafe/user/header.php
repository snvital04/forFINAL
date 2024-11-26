<?php
include 'php/session.php';
$user_id = isset($_SESSION['user_id']); // Store user ID in session
$image_path = isset($_SESSION['image_path']); // Store user ID in session
?>

<header class="fixed-top shadow bg-white">
    <nav class="navbar navbar-expand-lg justify-content-center">

        <div class="px-0 px-sm-5">
            <h1>
                <a class="navbar-brand " href="../index.php">
                    <img src="images/icon/logo.jpg" class="img-fluid lazy entered loaded rounded-pill"
                        data-ll-status="loaded" style="width:200px;" alt="Sobremesa Cafe/user Logo">
                </a>
            </h1>
        </div>
        <div class="collapse navbar-collapse" id="MainNav">
            <ul class="navbar-nav mx-auto my-3 my-lg-0">

                <li class="nav-item px-4 fs-5 active">
                    <a class="nav-link f-color" href="../index.php">Home</a>
                </li>
                <li class="nav-item dropdown px-4 fs-5  active">
                    <a class="nav-link dropdown-toggle f-color" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu f-color" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item f-color" href="food.php">Foods</a></li>
                        <li><a class="dropdown-item f-color" href="drinks.php">Drinks</a></li>
                        <li><a class="dropdown-item f-color" href="cake.php">Cake</a></li>
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
                <a type="button" class="btn btn-lg rounded f-color" href="addcart.php">
                    <img src="images/icon/cart.png" style="width:40px;height: 40px;" alt="Cart">
                </a>
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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

                    <a class="btn btn-lg f-color " href="../login.php">
                        Login
                    </a>
                </div>
                <div class="d-flex justify-content-center">

                    <!-- Trigger Button for Modal -->
                    <a class="btn btn-lg f-color" href="../register.php">
                        Sign Up
                    </a>

                </div><?php endif; ?>
            </div>
        </div>

    </nav>
</header>