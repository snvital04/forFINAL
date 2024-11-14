<div class="modal fade" id="signUpForm" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Sign Up</h5>
        <img src="/Sobremesa Cafe/user/images/icon/logo.jpg" style="width:100px" alt="Cart">
      </div>
      <div class="modal-body">
        <form method="post" action="../user/php/reg.php" id="registrationForm">
          <div id="registrationSection">
            <div class="form-outline mb-4">
              <label for="cars">Choose role:</label>
              <select class="form-select" name="role" aria-label="Default select example" required>
                <option value="" disabled>Select a role</option>
                <option value="Customer">Customer</option>
                <option value="Seller">Seller</option>
              </select>
            </div>
            <div class="form-outline mb-4">
              <label class="form-label" for="firstName">First Name</label>
              <input type="text" id="firstName" name="fname" class="form-control" required />
            </div>
            <div class="form-outline mb-4">
              <label class="form-label" for="lastName">Last Name</label>
              <input type="text" id="lastName" name="lname" class="form-control" required />
            </div>
            <div class="form-outline">
              <label class="form-label" for="birthdayDate">Birthday</label>
              <input type="date" class="form-control" name="bday" id="birthdayDate" required />
            </div>
            <div class="form-outline mb-4">
              <label class="form-label" for="username">User Name</label>
              <input type="text" id="username" name="uname" class="form-control" required />
            </div>
            <div class="form-outline mb-4">
              <label class="form-label" for="password">Password</label>
              <input type="password" id="password" name="pword" class="form-control" required />
            </div>
            <div class="form-outline mb-4">
              <label class="form-label" for="confirmPassword">Confirm Password</label>
              <input type="password" id="confirmPassword" name="confirmPword" class="form-control" required />
            </div>
            <div class="mt-4">
              <button type="submit" class="btn btn-success btn-lg">Register</button>
              <input type="button" class="btn btn-lg btn-danger" data-bs-dismiss="modal" value="Back" />
            </div>
          </div>
        </form>
        <div id="errorMessages" class="text-danger mt-3"></div>
      </div>
    </div>
  </div>
</div>