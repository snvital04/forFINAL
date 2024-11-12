<div class="modal fade" id="loginForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="card-body p-5 text-center bg-custom">
        <h2 class="text-center fs-1">Login</h2>
        <p class="disable fs-5">Please enter your Email and password!</p>
        <div class="mb-md-5 mt-md-4">

          <!-- Start of the form -->
          <form method="POST" action="php/login.php" id="validateForm">
            <div class="form-outline form-white mb-4">
              <label class="form-label" for="loginkey">Username</label>
              <input type="text" id="loginkey" name="loginkey" class="form-control form-control-lg" required />
              <span id="error_filluser" class="text-danger"></span>
            </div>
            <div class="form-outline form-white mb-4">
              <label class="form-label" for="pword">Password</label>
              <input type="password" id="pword" name="pword" class="form-control form-control-lg" required />
              <span id="error_fillpass" class="text-danger"></span>
            </div>
            <p class="small mb-5 pb-lg-2"><a class="" href="#!">Forgot password?</a></p>
            <button class="btn btn-lg px-5 btn-primary" type="submit">Login</button>
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
            <a class="btn btn-lg" data-bs-toggle="modal" data-bs-target="#signUpForm">
              Register
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>