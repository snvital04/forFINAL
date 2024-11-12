<?php
// Start the session at the beginning
include 'db/dbcon.php';

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['username']);
$forfname = isset($_SESSION['fname']);
$forlname = isset($_SESSION['lname']);
?>

<header class="fixed-top bg-white shadow">
  <nav class="navbar navbar-expand-lg justify-content-center">
    <div class="px-0 px-sm-5">
      <h1>
        <a class="navbar-brand" href="/Sobremesa Cafe/index.php">
          <img src="/Sobremesa Cafe/images/icon/logo.jpg" class="img-fluid lazy entered loaded" data-ll-status="loaded"
            style="width:200px;" alt="Sobremesa Cafe Logo">
        </a>
      </h1>
    </div>

    <!-- For responsive menu -->
    <div class="ms-lg-auto text-right navbar-content d-block d-lg-none p-auto">
      <div class="d-flex w-1">
        <ul class="list-unstyled list-inline ms-0">
          <li class="nav-item list-inline-item navbar-account">
            <div class="border-0 navbar-toggler" aria-controls="MainNav" aria-expanded="false"
              aria-label="Toggle navigation" data-bs-target="#MainNav" data-bs-toggle="collapse">
              <img class="hamburger-box" src="/Sobremesa Cafe/images/icon/menu.png" style="width:25px" alt="Menu">
            </div>
          </li>
          <li class="nav-item list-inline-item navbar-account">
            <a data-bs-toggle="modal" data-bs-target="#signUpForm">
              <img src="/Sobremesa Cafe/images/icon/user.png" style="width:25px" alt="User  Login">
            </a>
          </li>
          <li class="nav-item list-inline-item navbar-cart mx-2">
            <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
              <img src="/Sobremesa Cafe/images/icon/cart.png" style="width:25px;" alt="Cart">
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- /For responsive menu -->

    <!-- collapse navbar -->
    <div class="collapse navbar-collapse" id="MainNav">
      <ul class="navbar-nav mx-auto my-3 my-lg-0">
        <li class="nav-item px-4 fs-5 active">
          <a class="nav-link f-color" href="#home">Home</a>
        </li>
        <li class="nav-item px-4 fs-5 dropdown">
          <a class="nav-link f-color" href="#TrendingProducts">Trending Products</a>
        </li>
        <li class="nav-item px-4 fs-5">
          <a class="nav-link f-color" href="#Best-seller">Best Seller</a>
        </li>
        <li class="nav-item px-4 fs-5">
          <a class="nav-link f-color" href="#About">About</a>
        </li>
      </ul>
    </div>
    <!-- /collapse navbar -->

    <!-- Login and Cart Tab -->
    <div class="ms-lg-auto text-right navbar-content d-none d-lg-block px-5">
      <div class="d-flex">
        <ul class="list-unstyled list-inline ms-auto mb-0">
          <li class="nav-item list-inline-item navbar-account">
            <?php if ($isLoggedIn || $forfname || $forlname): ?>
              <a href="profile.php" class="btn btn-lg">
                <?php if (!empty($uploaded_image)): ?>
                  <img src="php/<?php echo $uploaded_image; ?>" class="rounded-circle" alt="Profile Picture"
                    style="width: 35px; height: 35px;">
                <?php else: ?>
                  <p>No profile picture uploaded.</p>
                <?php endif; ?>
                <?php echo htmlspecialchars($_SESSION['fname'] ?? '') . ' ' . htmlspecialchars($_SESSION['lname'] ?? ''); ?>
              </a>
              <a class="btn btn-lg" href="php/logout.php">
                <img src="images/icon/logout.png" style="width:25px;" alt="Logout">
                Logout
              </a>
              <a class="btn btn-default btn-lg" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart"
                aria-controls="offcanvasCart">
                <img src="images/icon/cart.png" style="width:25px;" alt="Cart">
                Your Cart
              </a>
            <?php else: ?>
              <button class="btn btn-lg" data-bs-toggle="modal" data-bs-target="#loginForm">
                <img src="images/icon/user.png" style="width:25px;" alt="Login">
                Login
              </button>
              <button class="btn btn-lg" data-bs-toggle="modal" data-bs-target="#signUpForm">
                Register
              </button>
            <?php endif; ?>
          </li>
        </ul>
      </div>
    </div>
    <!-- /Login and Cart Tab -->
  </nav>
</header>