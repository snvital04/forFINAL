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
  <link rel="stylesheet" href="css/cart.css">
</head>

<body id="home">

  <?php
  include 'header.php';
  include 'include_php/login.php';
  include 'include_php/register.php';
  include 'include_php/cart.php';
  ?>

  <main class="container mt-5">

    <?php
    //carousel
    include 'include_php/carousel.php';
    ?>

    <section class="" id="Best-seller">
    </section>

    <!-- AllProducts -->
    <section class="py-5" id="AllProducts">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="bootstrap-tabs product-tabs">

              <div class="tabs-header d-flex justify-content-between border-bottom my-5">
                <h3>All Products</h3>
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
                    <div class="card border-0 rounded-0 shadow" style="width: 18rem;">

                      <button type="button">
                        <img src="images/foods&drinks/BACON CHEESE.png" class="card-img-top rounded-0 image-fluid"
                          alt="images/foods&drinks/BACON CHEESE.png">
                      </button>

                      <div class="card-body mt-3 mb-3">
                        <div class="row">
                          <div class="col-10">
                            <h4 class="card-title">BACON CHEESE</h4>
                            <p></p>
                          </div>
                          <div class="col-2">
                            <i class="bi bi-bookmark-plus fs-2"></i>
                          </div>
                        </div>
                      </div>

                      <div class="row align-items-center text-center g-0">
                        <div class="col-4">
                          <h5>$129</h5>
                        </div>
                        <div class="col-8">
                          <a class="btn btn-dark w-100 p-3 rounded-0 text-warning" data-bs-toggle="modal"
                            data-bs-target="#singlePage">ADD TO CART</a>
                        </div>
                      </div>

                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

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