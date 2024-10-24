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
<header>
  <div class="container-fluid">
    <div class="row py-3 border-bottom">
      <div class="col-sm-4 col-lg-3 text-center text-sm-start">
        <div class="main-logo">
          <a href="index.php">
            <img src="images/icon/logo.jpg" alt="logo" class="img-fluid" style="width: 241px;height:54px;">
          </a>
        </div>
      </div>
      <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-5">
      <div class="search-bar row bg-light p-2 my-2 rounded-4">
        <div class="col-md-4 d-md-block">
            <select class="form-select border-0 bg-secondary">
                <option>All Categories</option>
                <option>Drinks</option>
                <option>Foods</option>
            </select>
        </div>
        <div class="col-11 col-md-8 d-flex">
            <form id="search-form" class="flex-grow-1"action="index.php" method="post">
                <input type="text" class="form-control border-0 bg-secondary" placeholder="Search..." />
            </form>
            <button type="submit" class="btn btn-outline">Search</button>
          </div>
        </div>
      </div>
      <div class="col-sm-8 col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
        <ul class="d-flex justify-content-end list-unstyled m-0">
          <li>
            <a type="button" class="btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLogin" aria-controls="offcanvasLogin">
              <img src="images/icon/user.png" style="width:20px;" alt="">
              Login
            </a>
          </li>
          <li>
            <a type="button" class="btn">
              <img src="images/icon/heart.png" style="width:20px;" alt="">
              Favorite
            </a>
          </li>
          <li>
            <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
              <img src="images/icon/cart.png" style="width:20px;" alt="">
              Your Cart
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>
<main>
  <div id="carouselExampleIndicators " class="carousel slide " data-ride="carousel">
    <ol class="carousel-indicators " >
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" >
      <div class="carousel-item active">
        <img class="d-block " src="images/foods&drinks/CHICKEN FLAKES.png" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block " src="images/foods&drinks/FRIES.png" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block " src="images/foods&drinks/SAUSAGE AND MUSHROOM PASTA.png" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>  
</main>
    <!--For slide cart -->
    <div class="offcanvas offcanvas-end " data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
      <div class="container-fluid" id="cart-form-container" style="padding:30px;"></div>
    </div>  
    <!--/ cart -->
    <!-- For login -->
    <div class="offcanvas offcanvas-end "style="width:50rem " data-bs-scroll="true" tabindex="-1" id="offcanvasLogin" >
        <div class="container-fluid" id="login-form-container" style="padding:30px;"></div>
    </div>
    <!--/ for login -->
<footer class="py-5">
  <div id="footer-bottom">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 copyright">
          <p>© 2025 Sobremesa Cafe. All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="js/swiper-init.js"></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="js/login.js"></script>
<script src="js/cart.js"></script>
<script src="js/register.js"></script>
</body>
</html>