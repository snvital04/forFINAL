<?php
session_start();
include('php/dbcon.php');

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['username']);
$forfname = isset($_SESSION['fname']);
$forlname = isset($_SESSION['lname']);

$loginSectionStyle = $isLoggedIn ? "background-color: lightgreen;" : "background-color: lightcoral;";
?>
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="style/register.css">
</head>

<body id="home">
  <!-- Header -->
  <header class="fixed-top bg-white shadow ">
    <nav class="navbar navbar-expand-lg justify-content-center ">
      <div class="px-0 px-sm-5">
        <h1>
          <a class="navbar-brand" href="/Sobremesa Cafe/index.php">
            <img src="/Sobremesa Cafe/images/icon/logo.jpg" class="img-fluid lazy entered loaded"
              data-ll-status="loaded" style="width:200px;" alt="Sobremesa Cafe Logo">
          </a>
        </h1>
      </div>

      <!-- For responsive menu -->
      <div class="ms-lg-auto text-right navbar-content d-block d-lg-none p-auto">
        <div class="d-flex w-1">
          <ul class="list-unstyled list-inline ms-0">
            <li class="nav-item list-inline-item navbar-account ">
              <div class="border-0 navbar-toggler" aria-controls="MainNav" aria-expanded="false"
                aria-label="Toggle navigation" data-bs-target="#MainNav" data-bs-toggle="collapse">
                <img class="hamburger-box" src="/Sobremesa Cafe/images/icon/menu.png" style="width:25px" alt="Menu">
              </div>
            </li>

            <?php if ($isLoggedIn || $forfname || $forlname): ?>
              <a href="profile.php"><?php
                                    echo htmlspecialchars($_SESSION['fname'] ?? ' ');
                                    echo htmlspecialchars($_SESSION['lname'] ?? ' '); ?></a>
              <a href="logout.php">Logout</a>
            <?php else: ?>
              <li class="nav-item list-inline-item navbar-account ">
                <a data-bs-toggle="modal" data-bs-target="#loginForm">
                  <img src="/Sobremesa Cafe/images/icon/user.png" style="width:25px" alt="User  Login">
                </a>
              </li>
              <li class="nav-item list-inline-item navbar-cart mx-2">
                <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                  <img src="/Sobremesa Cafe/images/icon/cart.png" style="width:25px;" alt="Cart">
                </a>
              </li>
            <?php endif; ?>

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
            <a class="nav-link f-color" href="">Foods</a>
          </li>
          <li class="nav-item px-4 fs-5">
            <a class="nav-link f-color" href="">Drinks</a>
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
        <div class="d-flex ">
          <ul class="list-unstyled list-inline ms-auto mb-0 ">
            <li class="nav-item list-inline-item navbar-account">
              <button class="btn btn-lg" data-bs-toggle="modal" data-bs-target="#loginForm">
                <img src="images/icon/user.png" style="width:25px;" alt="Login">
                Login
              </button>
              <button class="btn btn-lg" data-bs-toggle="modal" data-bs-target="#regForm">
                Register
              </button>
            </li>
            <li class="nav-item list-inline-item navbar-cart">
              <a class="btn btn-default btn-lg" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart"
                aria-controls="offcanvasCart">
                <img src="images/icon/cart.png" style="width:25px;" alt="Cart">
                Your Cart
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!-- /Login and Cart Tab -->

    </nav>
  </header>
  <!-- /Header -->

  <!-- Login form -->
  <div class="modal" id="loginForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="btn btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="card-body p-5 text-center bg-custom">
          <h2 class=" text-center fs-1">Login</h2>
          <p class="disable fs-5">Please enter your Email and password!</p>
          <div class="mb-md-5 mt-md-4 pb-5">

            <!-- Start of the form -->
            <form action="php/login.php" method="POST">
              <div data-mdb-input-init class="form-outline form-white mb-4">
                <label class="form-label" for="typeEmailX">Email</label>
                <input type="email" id="typeEmailX" name="email" class="form-control form-control-lg" required />
              </div>
              <div data-mdb-input-init class="form-outline form-white mb-4">
                <label class="form-label" for="typePasswordX">Password</label>
                <input type="password" id="typePasswordX" name="pword" class="form-control form-control-lg" required />
              </div>
              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>
              <button data-mdb-button-init data-mdb-ripple-init class="btn btn-lg px-5 btn-primary"
                type="submit">Login</button>
            </form>
            <!-- End of the form -->

            <div class="d-flex justify-content-center text-center mt-4 pt-1">
              <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
              <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
              <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
            </div>
          </div>
          <div>
            <p class="mb-0">Don't have an account?
              <a class="btn btn-lg" data-bs-toggle="modal" data-bs-target="#regForm">
                Register
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/Login form  -->

  <!-- Register form -->
  <div class="modal" id="regForm" tabindex="-1" aria-labelledby="registrationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="registrationModalLabel">Registration Form</h5>
          <button type="button" class="btn btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          <form action="php/register.php" method="POST">
            <div class="form-outline mb-4">
              <label class="form-label" for="firstName">First Name</label>
              <input type="text" id="firstName" name="fname" class="form-control" required />
            </div>
            <div class="form-outline mb-4">
              <label class="form-label" for="lastName">Last Name</label>
              <input type="text" id="lastName" name="lname" class="form-control" required />
            </div>
            <div class="row mb-4">
              <div class="col-md-6">
                <div class="form-outline">
                  <label class="form-label" for="birthdayDate">Birthday</label>
                  <input type="date" class="form-control" name="bday" id="birthdayDate" required />
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
              <input type="email" id="emailAddress" name="email" class="form-control form-control-lg" required />
            </div>
            <div class="form-outline mb-4">
              <label class="form-label" for="password">Password</label>
              <input type="password" id="password" name="pword" class="form-control form-control-lg" required />
            </div>
            <div class="mt-4 pt-2">
              <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <p class="mb-0">Already have an account? <a class="btn btn-lg" data-bs-toggle="modal"
              data-bs-target="#loginForm">Log in</a></p>
        </div>
      </div>
    </div>
  </div>
  <!-- ./register form -->

  <!--For slide cart -->
  <div class="offcanvas offcanvas-end " data-bs-scroll="true" tabindex="-1" id="offcanvasCart"
    aria-labelledby="My Cart">
    <div class="container-fluid" id="cart-form-container" style="padding:30px;"></div>
  </div>
  <!--/For slide cart -->

  <!-- Main -->
  <main class="container mt-5">

    <!-- Carousel -->
    <div id="myCarousel" class="carousel slide shadow" data-bs-ride="carousel" data-bs-interval="3000">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row justify-content-center align-items-center ">
            <div class="col-md-5 text-center text-md-start responsive-text-slide">
              <h1>
                <div class="display-2">Drinks</div>
                <div class="display-5">Lorem, ipsum dolor.</div>
              </h1>
              <p class="lead my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              <div>
                <a href="#pricing" class="btn btn-secondary hover-button">Shop Now</a>
              </div>
            </div>
            <div class="col-md-5">
              <img class="img-fluid image-carousel" src="/Sobremesa Cafe/images/foods&drinks/BEEF TAPA.png"
                alt="Food Image" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row justify-content-center align-items-center">
            <div class="col-md-5 text-center text-md-start responsive-text-slide">
              <h1>
                <div class="display-2">Drinks</div>
                <div class="display-5">Lorem, ipsum dolor.</div>
              </h1>
              <p class="lead my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              <div>
                <a href="#pricing" class="btn btn-secondary hover-button">Shop Now</a>
              </div>
            </div>
            <div class="col-md-5">
              <img class="img-fluid image-carousel" src="/Sobremesa Cafe/images/foods&drinks/BACON CHEESE.png"
                alt="Food Image" class="img-fluid">
            </div>
          </div>
        </div>

        <div class="carousel-item">
          <div class="row justify-content-center align-items-center">
            <div class="col-md-5 text-center text-md-start responsive-text-slide">
              <h1>
                <div class="display-2">Drinks</div>
                <div class="display-5">Lorem, ipsum dolor.</div>
              </h1>
              <p class="lead my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              <div>
                <a href="#pricing" class="btn btn-secondary hover-button">Shop Now</a>
              </div>
            </div>
            <div class="col-md-5">
              <img class="img-fluid image-carousel" src="/Sobremesa Cafe/images/foods&drinks/CHICKEN ALFREDO.png"
                alt="Food Image" class="img-fluid">
            </div>
          </div>
        </div>
      </div>

      <!-- Custom Buttons for Sliding -->
      <button class="carousel-control-prev m-4" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
      <!-- /Custom Buttons for Sliding -->
    </div>
    <!-- /Carousel -->

    <!-- BEST SELLER -->
    <section class="" id="Best-seller">
      <div>
        <h1 class="text-center fs-1 f-color">Best Seller</h1>
      </div>
      <div class="scroll-container d-flex justify-content-between align-items-center">
        <button class="btn btn-primary" id="scrollLeftButton">←</button>
        <div class="content" id="scrollContent">
          <div class="col-md-3 item">
            <div class="card food-item" style="width: 18rem;">
              <img src="/Sobremesa Cafe/images/foods&drinks/BUFFALO CHICKEN WINGS.png" draggable="false"
                class="card-img-top" alt="Buffalo Chicken Wings">
              <div class="card-body">
                <h5 class="card-title">Buffalo Chicken Wings</h5>
                <p class="card-text">Some quick example .</p>
                <button class="btn btn-success btn-sm add-to-cart">Add to Cart</button>
              </div>
            </div>
          </div>

          <!-- Repeat the item div as necessary -->
          <!-- ... -->
        </div>
        <button class="btn btn-primary" id="scrollRightButton">→</button>
      </div>
    </section>
    <!--/ BEST SELLER -->


    <!-- DRINKS -->
    <section class="py-5">
      <div class="container-fluid">

        <div class="row">
          <div class="col-md-12">

            <div class="bootstrap-tabs product-tabs">
              <div class="tabs-header d-flex justify-content-between border-bottom my-5">
                <h3>Trending Products</h3>
                <nav>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a href="#" class="nav-link text-uppercase fs-6 active" id="nav-all-tab" data-bs-toggle="tab"
                      data-bs-target="#nav-all">All</a>
                    <a href="#" class="nav-link text-uppercase fs-6" id="nav-fruits-tab" data-bs-toggle="tab"
                      data-bs-target="#nav-fruits">FOODS</a>
                    <a href="#" class="nav-link text-uppercase fs-6" id="nav-juices-tab" data-bs-toggle="tab"
                      data-bs-target="#nav-juices">DRINKS</a>
                  </div>
                </nav>
              </div>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">

                  <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                    <div class="col shadow py-2">
                      <div class="product-item text-center">
                        <a href="#" class="btn-wishlist"><img src="images/icon/heart.png" style="width: 25px;"
                            alt=""></a>
                        <a href="index.html" title="Product Title">
                          <img src="images/foods&drinks/BACON CHEESE.png" style="width: 200px;" class="img-fluid">
                        </a>
                        <h3>Sunstar Fresh Melon Juice</h3>
                        <span class="qty">1 Unit</span><span class="rating"> 4.5</span>
                        <span class="price">$18.00</span>
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="product-qty">
                            <div>
                              <button type="button" class="quantity-left-minus btn btn-danger btn-number"
                                data-type="minus">
                                -
                              </button>

                              <input type="text" id="quantity" name="quantity" class="" value="1">

                              <button type="button" class="quantity-right-plus btn btn-success btn-number"
                                data-type="plus">
                                +
                              </button>
                            </div>

                          </div>
                          <div>
                            <button href="#" class="btn btn-primary">Add to Cart</button>
                          </div>

                        </div>
                      </div>
                    </div>

                  </div>
                  <!-- / product-grid -->

                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- //DRINKS -->

    <!-- FOODS -->
    <!-- //FOODS -->
  </main>
  <!--/MAIN  -->

  <!--ABOUT  -->
  <footer class="">
    <section id="About">
      <div id="footer-bottom">
        <div class="container-fluid">
          <div class="row">
            <div>
              <h1>About</h1>
              <h1>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos incidunt est quae iste natus temporibus
                quas nam dolorem eos commodi illo, similique, quidem laboriosam sequi blanditiis harum accusantium
                consequatur quibusdam animi doloribus, autem consectetur pariatur quod sit. Nesciunt, id impedit
                provident ipsam possimus quod ipsum nostrum! Nisi ex repellat inventore doloribus. Sequi, expedita
                voluptatum ducimus, aut dolores iste dolor velit maiores ipsa quam impedit doloremque. Minima iste
                repellat facilis asperiores quisquam. Laudantium neque in incidunt et, harum consequuntur praesentium
                ab?</h1>
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
  <script src="js/cart.js"></script>
  <script src="js/script.js"></script>
  <script src="\Sobremesa Cafe\js\login.js"></script>
</body>

</html>