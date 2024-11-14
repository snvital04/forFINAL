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

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <section id="team" class="team_area section-padding">
      <div class="container">
        <h2 class="title_spectial">Meet creative team</h2>
        <div class="row text-center">
          <div class="col-lg-2 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
            data-wow-offset="0"
            style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;">
            <div class="our-team">
              <div class="single-team">
                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-fluid" alt="">
                <h3>Gary Hunt</h3>
                <p>Marketer</p>
              </div>
              <ul class="social">
                <li><a href="#" class="fa fa-facebook facebook"></a></li>
                <li><a href="#" class="fa fa-twitter twitter"></a></li>
                <li><a href="#" class="fa fa-google google"></a></li>
              </ul>
            </div>
            <!--- END OUR TEAM -->
          </div>
          <!--- END COL -->
          <div class="col-lg-2 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"
            data-wow-offset="0"
            style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInUp;">
            <div class="our-team">
              <div class="single-team">
                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="img-fluid" alt="">
                <h3>Ayoub Fennouni</h3>
                <p>Manager</p>
              </div>
              <ul class="social">
                <li><a href="#" class="fa fa-facebook facebook"></a></li>
                <li><a href="#" class="fa fa-twitter twitter"></a></li>
                <li><a href="#" class="fa fa-google google"></a></li>
              </ul>
            </div>
            <!--- END OUR TEAM -->
          </div>
          <!--- END COL -->
          <div class="col-lg-2 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s"
            data-wow-offset="0"
            style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
            <div class="our-team">
              <div class="single-team">
                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="img-fluid" alt="">
                <h3>Mark Linomit</h3>
                <p>Python Developer</p>
              </div>
              <ul class="social">
                <li><a href="#" class="fa fa-facebook facebook"></a></li>
                <li><a href="#" class="fa fa-twitter twitter"></a></li>
                <li><a href="#" class="fa fa-google google"></a></li>
              </ul>
            </div>
            <!--- END OUR TEAM -->
          </div>
          <!--- END COL -->
          <div class="col-lg-2 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s"
            data-wow-offset="0"
            style="visibility: visible; animation-duration: 1s; animation-delay: 0.4s; animation-name: fadeInUp;">
            <div class="our-team">
              <div class="single-team">
                <img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="img-fluid" alt="">
                <h3>Thompson Luis</h3>
                <p>Developer</p>
              </div>
              <ul class="social">
                <li><a href="#" class="fa fa-facebook facebook"></a></li>
                <li><a href="#" class="fa fa-twitter twitter"></a></li>
                <li><a href="#" class="fa fa-google google"></a></li>
              </ul>
            </div>
            <!--- END OUR TEAM -->
          </div>
          <!--- END COL -->
          <div class="col-lg-2 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s"
            data-wow-offset="0"
            style="visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: fadeInUp;">
            <div class="our-team">
              <div class="single-team">
                <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="img-fluid" alt="">
                <h3>Amira Yerden</h3>
                <p>UI/UX Designer</p>
              </div>
              <ul class="social">
                <li><a href="#" class="fa fa-facebook facebook"></a></li>
                <li><a href="#" class="fa fa-twitter twitter"></a></li>
                <li><a href="#" class="fa fa-google google"></a></li>
              </ul>
            </div>
            <!--- END OUR TEAM -->
          </div>
          <!--- END COL -->
          <div class="col-lg-2 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s"
            data-wow-offset="0"
            style="visibility: visible; animation-duration: 1s; animation-delay: 0.6s; animation-name: fadeInUp;">
            <div class="our-team">
              <div class="single-team">
                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-fluid" alt="">
                <h3>Martha Valdes</h3>
                <p>React Developer</p>
              </div>
              <ul class="social">
                <li><a href="#" class="fa fa-facebook facebook"></a></li>
                <li><a href="#" class="fa fa-twitter twitter"></a></li>
                <li><a href="#" class="fa fa-google google"></a></li>
              </ul>
            </div>
            <!--- END OUR TEAM -->
          </div>
          <!--- END COL -->
        </div>
        <!--- END ROW -->
      </div>
      <!--- END CONTAINER -->
    </section>
    <section id="bod" class="bod_area">
      <div class="container">
        <h2 class="title_spectial">Board of directors</h2>
        <div class="row text-center">
          <div class="col-lg-3 col-sm-3 col-xs-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s"
            data-wow-offset="0"
            style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInLeft;">
            <div class="our-bod">
              <div class="single-bod">
                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-fluid" alt="">
                <h3>Gary Hunt</h3>
                <p>Marketer</p>
              </div>
              <ul class="social">
                <li><a href="#" class="fa fa-facebook facebook"></a></li>
                <li><a href="#" class="fa fa-twitter twitter"></a></li>
                <li><a href="#" class="fa fa-google google"></a></li>
              </ul>
            </div>
            <!--- END OUR BOARD OF DIRECTORS -->
          </div>
          <!--- END COL -->
          <div class="col-lg-3 col-sm-3 col-xs-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s"
            data-wow-offset="0"
            style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInLeft;">
            <div class="our-bod">
              <div class="single-bod">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" class="img-fluid" alt="">
                <h3>Ayoub Fennouni</h3>
                <p>Manager</p>
              </div>
              <ul class="social">
                <li><a href="#" class="fa fa-facebook facebook"></a></li>
                <li><a href="#" class="fa fa-twitter twitter"></a></li>
                <li><a href="#" class="fa fa-google google"></a></li>
              </ul>
            </div>
            <!--- END OUR BOARD OF DIRECTORS -->
          </div>
          <!--- END COL -->
          <div class="col-lg-3 col-sm-3 col-xs-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s"
            data-wow-offset="0"
            style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInLeft;">
            <div class="our-bod">
              <div class="single-bod">
                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="img-fluid" alt="">
                <h3>Mark Linomit</h3>
                <p>Python Developer</p>
              </div>
              <ul class="social">
                <li><a href="#" class="fa fa-facebook facebook"></a></li>
                <li><a href="#" class="fa fa-twitter twitter"></a></li>
                <li><a href="#" class="fa fa-google google"></a></li>
              </ul>
            </div>
            <!--- END OUR BOARD OF DIRECTORS -->
          </div>
          <!--- END COL -->
          <div class="col-lg-3 col-sm-3 col-xs-12 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.4s"
            data-wow-offset="0"
            style="visibility: visible; animation-duration: 1s; animation-delay: 0.4s; animation-name: fadeInLeft;">
            <div class="our-bod">
              <div class="single-bod">
                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="img-fluid" alt="">
                <h3>Thompson Luis</h3>
                <p>Developer</p>
              </div>
              <ul class="social">
                <li><a href="#" class="fa fa-facebook facebook"></a></li>
                <li><a href="#" class="fa fa-twitter twitter"></a></li>
                <li><a href="#" class="fa fa-google google"></a></li>
              </ul>
            </div>
            <!--- END OUR BOARD OF DIRECTORS -->
          </div>
          <!--- END COL -->
        </div>
        <!--- END ROW -->
      </div>
      <!--- END CONTAINER -->
    </section>
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