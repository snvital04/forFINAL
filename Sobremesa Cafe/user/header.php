<?php
include 'php/session.php';
$user_id = isset($_SESSION['user_id']); // Store user ID in session
$image_path = isset($_SESSION['image_path']); // Store user ID in session
?>

<header class="fixed-top bg-white shadow">
  <nav class="navbar navbar-expand-lg justify-content-center">

    <div class="px-0 px-sm-5">
      <h1>
        <a class="navbar-brand" href="/Sobremesa Cafe/user/index.php">
          <img src="/Sobremesa Cafe/user/images/icon/logo.jpg" class="img-fluid lazy entered loaded"
            data-ll-status="loaded" style="width:200px;" alt="Sobremesa Cafe/user Logo">
        </a>
      </h1>
    </div>

    <!-- For responsive menu -->
    <div class=" ms-lg-auto text-right navbar-content d-block d-lg-none p-auto">
      <div class="d-flex w-1">
        <ul class="list-unstyled list-inline ms-0">
          <li class="nav-item list-inline-item navbar-account">
            <div class="border-0 navbar-toggler" aria-controls="MainNav" aria-expanded="false"
              aria-label="Toggle navigation" data-bs-target="#MainNav" data-bs-toggle="collapse">
              <img class="hamburger-box" src="/Sobremesa Cafe/user/images/icon/menu.png" style="width:25px" alt="Menu">
            </div>
          </li>
          <li class="nav-item list-inline-item navbar-account">
            <a data-bs-toggle="modal" data-bs-target="#signUpForm">
              <img src="/Sobremesa Cafe/user/images/icon/user.png" style="width:25px" alt="User  Login">
            </a>
          </li>
          <li class="nav-item list-inline-item navbar-cart mx-2">
            <a data-bs-toggle="offcanvas" href="addcart.php">
              <img src="/Sobremesa Cafe/user/images/icon/cart.png" style="width:25px;" alt="Cart">
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- collapse navbar -->
    <div class="collapse navbar-collapse" id="MainNav">
      <ul class="navbar-nav mx-auto my-3 my-lg-0">

        <li class="nav-item px-4 fs-5 active">
          <a class="nav-link f-color" href="index.php">Home</a>
        </li>

        <li class="nav-item px-4 fs-5 dropdown">
          <a class="nav-link f-color" href="#AllProducts">All Products</a>
        </li>

        <li class="nav-item px-4 fs-5">
          <a class="nav-link f-color" href="#Best-seller">Best Seller</a>
        </li>

        <li class="nav-item px-4 fs-5">
          <a class="nav-link f-color" href="#About">About</a>
        </li>

      </ul>
    </div>

    <!-- Login and Cart Tab -->
    <div class="ms-lg-auto text-right navbar-content d-none d-lg-block px-5">
      <div class="d-flex">

        <?php if ($user_id): ?>
        <a href="profile.php" class="btn btn-lg">
          <?php if (!empty($image_path)): ?>
          <img src="php/image_upload/profile_pic.png" src="php/image_upload/profile_pic.jpg"
            class="rounded-circle border border-dark" alt="Profile Picture" style="width: 35px; height: 35px;">
          <?php else: ?>
          <img src="images/icon/profile.png" style="width: 35px; height: 35px;">
          <?php endif; ?>
          <?php echo htmlspecialchars($_SESSION['firstname'] ?? '') . ' ' . htmlspecialchars($_SESSION['lastname'] ?? ''); ?>
        </a>

        <a class="btn btn-lg" href="php/logout.php">
          <img src="images/icon/logout.png" style="width:25px;" alt="Logout">
          Logout
        </a>

        <a type="button" class="btn btn-lg" href="addcart.php">
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

      </div>
    </div>

  </nav>
</header>