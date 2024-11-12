
const validateForm = document.getElementById('validateForm');
validateForm.addEventListener("submit",function (event){
  // Get form values
  const loginkey = document.getElementById('loginkey').value.trim();
  const password = document.getElementById('pword').value.trim();
  const error_filluser = document.getElementById('error_filluser');
  const error_fillpass = document.getElementById('error_fillpass');
  const filluser ="Please fill in the username";
  const fillpass ="Please fill in the password";
  // Basic validation
  if (loginkey === ''  ) {
    event.preventDefault(); 
    error_filluser.textContent = filluser;
  }
  else if (password === ''){
    event.preventDefault(); 
    error_fillpass.textContent =fillpass;
  }
   else {
    error_fillpass.textContent = ''; // Clear any previous error messages
      document.getElementById('validateForm').submit(); // Submit the form
  }
})  

 // Function to show the login modal
 function showLoginModal() {
  const loginModal = new bootstrap.Modal(document.getElementById('loginForm'));
  loginModal.show();
}

// Check if the URL contains the showLoginModal parameter
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.has('showLoginModal') && urlParams.get('showLoginModal') === 'true') {
  showLoginModal();
}