<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@Sobremesa Cafe Admin</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body id="home">
  <!-- Header Include the header.php file-->
  <?php
  //header
  include 'header.php';
  //login
  include 'include_php/login.php';
  //register
  include 'include_php/register.php';
  ?>

  <!-- Main -->
  <main class="container mt-5">

    <?php
    //carousel
    include 'include_php/carousel.php';
    ?>


    <!-- BEST SELLER -->
    <section class="" id="Best-seller">

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

                    <!-- card -->
                    <div class="col card shadow">
                      <a href="#" data-abc="true">
                        <img src="images/foods&drinks/BACON CHEESE.png" alt="" class="img-fluid">
                        <!-- Added img-fluid class -->
                      </a>
                      <div class="card-footer bg-gray-200 border-top border-gray-300 ">
                        <a href="#" class="h3">Apple watch</a>
                        <div class="row py-2 ">
                          <div class=" col-sm h5 px-6">$299.00</div>
                          <?php if ($isLoggedIn || $forfname || $forlname): ?>
                          <a class="btn btn-default col-sm align-middle p-0" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                            <img src="images/icon/cart.png" style="width:25px;" alt="Cart">
                          </a>
                          <?php endif ?>
                        </div>


                      </div>
                    </div>
                  </div>
                  <!-- card -->

                </div>
              </div>
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
  <script src="js/cart.js"></script>
</body>

</html>