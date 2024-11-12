<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body id="home">
  <!-- Header Include the header.php file-->
  <?php include 'header.php'; ?>
  <!-- /Header -->

  <!-- Login form -->
  <?php include 'login.php'; ?>
  <!-- /Login form -->

  <!-- Sign Up Form -->
  <?php include 'register.php'; ?>
  <!-- /Sign Up Form -->

  <!-- Your existing cart and main content code goes here -->

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
  <script src="js/script.js"></script>
  <script src="js/login.js"></script>
  <script src="js/register.js"></script>
</body>

</html>
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

</head>

<body id="home">
  <!-- Header Include the header.php file-->
  <?php
  include 'header.php';
  ?>
  <!-- /Header -->

  <!-- Login form -->
  <?php
  include 'login.php';
  ?>
  <!--/Login form  -->

  <!-- Sign Up Form -->
  <?php
  include 'register.php';
  ?>
  <!-- /Sign Up Form -->
  <!--For slide cart -->
  <div class="offcanvas offcanvas-end " data-bs-scroll="true" tabindex="-1" id="offcanvasCart"
    aria-labelledby="My Cart">
    <div class="container-fluid" id="cart-form-container" style="padding:30px;">
      <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container h-100 py-5">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
              <div class="card shopping-cart" style="border-radius: 15px;">
                <div class="card-body">

                  <div class="row">
                    <div class="col-lg-6 px-5 py-4">

                      <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Your products</h3>

                      <div class="d-flex align-items-center mb-5">
                        <div class="flex-shrink-0">
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/13.webp"
                            class="img-fluid" style="width: 150px;" alt="Generic placeholder image">
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <a href="#!" class="float-end"><i class="fas fa-times"></i></a>
                          <h5 class="text-primary">Samsung Galaxy M11 64GB</h5>
                          <h6 style="color: #9e9e9e;">Color: white</h6>
                          <div class="d-flex align-items-center">
                            <p class="fw-bold mb-0 me-5 pe-3">799$</p>
                            <div class="def-number-input n  umber-input safari_only">
                              <button data-mdb-button-init
                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                class="minus"></button>
                              <input class="quantity fw-bold bg-body-tertiary text-body" min="0" name="quantity"
                                value="1" type="number">
                              <button data-mdb-button-init
                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                class="plus"></button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="d-flex align-items-center mb-5">
                        <div class="flex-shrink-0">
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/6.webp"
                            class="img-fluid" style="width: 150px;" alt="Generic placeholder image">
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <a href="#!" class="float-end"><i class="fas fa-times"></i></a>
                          <h5 class="text-primary">Headphones Bose 35 II</h5>
                          <h6 style="color: #9e9e9e;">Color: Red</h6>
                          <div class="d-flex align-items-center">
                            <p class="fw-bold mb-0 me-5 pe-3">239$</p>
                            <div class="def-number-input number-input safari_only">
                              <button data-mdb-button-init
                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                class="minus"></button>
                              <input class="quantity fw-bold bg-body-tertiary text-body" min="0" name="quantity"
                                value="1" type="number">
                              <button data-mdb-button-init
                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                class="plus"></button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="d-flex align-items-center mb-5">
                        <div class="flex-shrink-0">
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/1.webp"
                            class="img-fluid" style="width: 150px;" alt="Generic placeholder image">
                        </div>
                        <div class="flex-grow-1 ms-3">
                          <a href="#!" class="float-end"><i class="fas fa-times"></i></a>
                          <h5 class="text-primary">iPad 9.7 6-gen WiFi 32GB</h5>
                          <h6 style="color: #9e9e9e;">Color: rose pink</h6>
                          <div class="d-flex align-items-center">
                            <p class="fw-bold mb-0 me-5 pe-3">659$</p>
                            <div class="def-number-input number-input safari_only">
                              <button data-mdb-button-init
                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                class="minus"></button>
                              <input class="quantity fw-bold bg-body-tertiary text-body" min="0" name="quantity"
                                value="2" type="number">
                              <button data-mdb-button-init
                                onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                class="plus"></button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <hr class="mb-4" style="height: 2px; background-color: #1266f1; opacity: 1;">

                      <div class="d-flex justify-content-between px-x">
                        <p class="fw-bold">Discount:</p>
                        <p class="fw-bold">95$</p>
                      </div>
                      <div class="d-flex justify-content-between p-2 mb-2 bg-primary">
                        <h5 class="fw-bold mb-0">Total:</h5>
                        <h5 class="fw-bold mb-0">2261$</h5>
                      </div>

                    </div>

                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
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
              <img class=" " style="width:500px;height:750px;" src="/Sobremesa Cafe/images/foods&drinks/BEEF TAPA.png"
                alt="Food Image">
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
              <img class="" src="/Sobremesa Cafe/images/foods&drinks/BACON CHEESE.png" alt="Food Image"
                style="width:500px;height:750px">
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
              <img class="" src="/Sobremesa Cafe/images/foods&drinks/CHICKEN ALFREDO.png" alt="Food Image"
                style="width:500px;height:750px">
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


    <!-- TrendingProducts -->
    <section class="py-5" id="TrendingProducts">
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
    <!-- //TrendingProducts -->

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
              <h1>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos incidunt est quae iste natus
                temporibus
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
  <script src="js/script.js"></script>
  <script src="js/login.js"></script>
  <script src="js/register.js"></script>
</body>

</html>