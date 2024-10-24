<!-- login.html -->
<!-- Pills navs -->
<ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="tab-login" data-bs-toggle="pill" href="#pills-login" role="tab"
           aria-controls="pills-login" aria-selected="true">Login</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="tab-register" data-bs-toggle="pill" href="#pills-register" role="tab"
           aria-controls="pills-register" aria-selected="false">Register</a>
    </li>
</ul>
<!-- Pills navs -->

<div class="tab-content">
    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
        <form style="padding:10px;margin-top:20px;">
            <h1 class="text-center">LOGIN</h1>
            <div class="form-floating">
                <input class="form-control"type="email" id="floatingEmail"/>
                <label for="floatingEmail">Email:</label>
                
            </div>
            <div class="form-floating">
                <input class="form-control"type="password" id="floatingpass"  />
                <label for="floatingpass">Password:</label>
            </div>
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                        <label class="form-check-label" for="form2Example31"> Remember me </label>
                    </div>
                </div>
                <div class="col">
                    <a href="#!">Forgot password?</a>
                </div>
            </div>
            <button type="button" class="btn btn-primary btn-block mb-4">Log in</button>
        </form>
    </div>

    <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
        <form> 
            <h1 class="text-center">Registration Form</h1>
            <div class="form-outline mb-4">
                <label class="form-label" for="firstName">First Name</label>
                <input type="text" id="firstName" class="form-control" />
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="lastName">Last Name</label>
                <input type="text" id="lastName" class="form-control" />
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="birthdayDate">Birthday</label>
                <input type="date" class="form-control" id="birthdayDate" />
            </div>
            <div class="form-outline mb-4">
                <label class="form-label">Gender:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender"
                        value="option1" />
                    <label class="form-check-label" for="femaleGender">Female</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender"
                        value="option2" />
                    <label class="form-check-label" for="maleGender">Male</label>
                </div>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="emailAddress">Email</label>
                <input type="email" id="emailAddress" class="form-control form-control-lg" />
            </div>
            <div class="form-outline mb-4">
                <label class=" form-label" for="phoneNumber">Phone Number</label>
                <input type="tel" id="phoneNumber" class="form-control form-control-lg" />
            </div>
            <div class="mt-4 pt-2">
                <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit" value="Submit" />
            </div>
        </form>
    </div>
</div>
<!-- Pills content -->