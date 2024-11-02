<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="style/register.css">
</head>
<body>
<!-- Header -->
<header class="fixed-top bg-white shadow ">
  <nav class="navbar navbar-expand-lg justify-content-center">
    <div class="px-0 px-sm-5">
      <h1>
        <a class="navbar-brand" href="/">
          <img src="images/icon/logo.jpg" class="img-fluid lazy entered loaded" data-ll-status="loaded" style="width:200px;">
        </a>
      </h1>
    </div>

    <!-- For responsive menu -->
    <div class="ms-lg-auto text-right navbar-content d-block d-lg-none p-auto">
      <div class="d-flex w-1">
        <ul class="list-unstyled list-inline ms-0">
          <li class="nav-item list-inline-item navbar-account ">
            <div class="border-0 navbar-toggler" aria-controls="MainNav" aria-expanded="false" aria-label="Toggle navigation" data-bs-target="#MainNav" data-bs-toggle="collapse" type="button">
              <img class="hamburger-box" src="/images/icon/menu.png" style="width:25px" alt="">
            </div>
          </li>
          <li class="nav-item list-inline-item navbar-account ">
            <a type="button" href="login.php">
              <img src="images/icon/user.png" style="width:25px" alt="">
            </a>
          </li>
          <li class="nav-item list-inline-item navbar-cart mx-2">
            <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
              <img src="images/icon/cart.png" style="width:25px;" alt="">
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
          <a class="nav-link f-color" href="">Home</a>
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
    <!-- /colapse navbar -->

    <!-- Login and Cart Tab -->
    <div class="ms-lg-auto text-right navbar-content d-none d-lg-block px-5">
      <div class="d-flex ">
        <ul class="list-unstyled list-inline ms-auto mb-0 ">
          <li class="nav-item list-inline-item navbar-account">
            <a type="button" class="btn btn-default btn-lg" href="login.php">
              <img src="images/icon/user.png" style="width:25px;" alt="">
              Login
            </a>
          </li>
          <li class="nav-item list-inline-item navbar-cart"> 
            <a type="button" class="btn btn-default btn-lg" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
              <img src="images/icon/cart.png" style="width:25px;" alt="">
              Your Cart
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- /Login and Cart Tab -->
  </nav>
</header>
<!-- /Heeader -->
 
<!--For slide cart -->
    <div class="offcanvas offcanvas-end " data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
      <div class="container-fluid" id="cart-form-container" style="padding:30px;"></div>
    </div>  
<!--/For slide cart -->  

<!-- Main -->
<main class="container mt-5">
  <div class="container shadow">

    <!-- Carousel -->
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row justify-content-center align-items-center">
            <div class="col-md-5 text-center text-md-start responsive-text-slide">
              <h1>
                <div class="display-2">Drinks</div>
                  <div class="display-5">Lorem, ipsum dolor.</div>
              </h1>
              <p class="lead my-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
              <div>
                <a href="#pricing" class="btn btn-secondary hover-button">Buy Now</a>
              </div>
            </div>
            <div class="col-md-5">
              <img class="img-fluid image-carousel" src="/images/foods&drinks/FRIES.png" alt="" class="img-fluid"image-carousel>
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
                <a href="#pricing" class="btn btn-secondary hover-button">Buy Now</a>
              </div>
            </div>
            <div class="col-md-5">
              <img  class="img-fluid image-carousel" src="/images/foods&drinks/BACON CHEESE.png" alt="" class="img-fluid">
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
                <a href="#pricing" class="btn btn-secondary hover-button">Buy Now</a>
              </div>
            </div>
            <div class="col-md-5">
              <img class="img-fluid " src="/images/foods&drinks/CHICKEN ALFREDO.png" alt="" class="img-fluid">
            </div>
          </div>
        </div>
      </div>

      <!-- Custom Buttons for Sliding -->
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
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

  </div>

<!-- BEST SELLER -->
  <section class=""id="Best-seller">
    <h1 class="text-center ">Best Seller</h1>
    <div class="row">
      <div class="col-md-3">
        <div class="food-item">
            <img src="/images/foods&drinks/BUFFALO CHICKEN WINGS.png" alt="Food 1" class="food-image">
            <h5>Food Item 1</h5>
            <button class="btn btn-primary">Add to Cart</button>
        </div>
      </div>
      <div class="col-md-3">
        <div class="food-item">
            <img src="/images/foods&drinks/BUFFALO CHICKEN WINGS.png" alt="Food 2" class="food-image">
            <h5>Food Item 2</h5>
            <button class="btn btn-primary">Add to Cart</button>
        </div>
      </div>
      <div class="col-md-3">
        <div class="food-item">
            <img src="/images/foods&drinks/BUFFALO CHICKEN WINGS.png" alt="Food 3" class="food-image">
            <h5>Food Item 3</h5>
            <button class="btn btn-primary">Add to Cart</button>
        </div>
      </div>
      <div class="col-md-3">
        <div class="food-item">
            <img src="/images/foods&drinks/BUFFALO CHICKEN WINGS.png" alt="Food 4" class="food-image">
            <h5>Food Item 4</h5>
            <button class="btn btn-primary">Add to Cart</button>
        </div>
      </div>
    </div>
  </section>
  <!--/ BEST SELLER -->

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
            <h1>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos incidunt est quae iste natus temporibus quas nam dolorem eos commodi illo, similique, quidem laboriosam sequi blanditiis harum accusantium consequatur quibusdam animi doloribus, autem consectetur pariatur quod sit. Nesciunt, id impedit provident ipsam possimus quod ipsum nostrum! Nisi ex repellat inventore doloribus. Sequi, expedita voluptatum ducimus, aut dolores iste dolor velit maiores ipsa quam impedit doloremque. Minima iste repellat facilis asperiores quisquam. Laudantium neque in incidunt et, harum consequuntur praesentium ab?</h1>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="js/cart.js"></script>
<script src="js/script.js"></script>\
</body>
</html>