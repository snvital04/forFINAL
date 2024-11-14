document.getElementById('registrationForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent form submission for validation

  // Clear previous error messages
  const errorMessagesDiv = document.getElementById('errorMessages');
  errorMessagesDiv.innerHTML = '';

  // Validation flags
  let isValid = true;

  // Retrieve values
  const firstName = document.getElementById('firstName').value;
  const lastName = document.getElementById('lastName').value;
  const username = document.getElementById('username').value.trim();
  const password = document.getElementById('password').value;
  const confirmPassword = document.getElementById('confirmPassword').value;

  // Validate required fields
  if (!firstName) {
    errorMessagesDiv.innerHTML += '<p>First Name is required.</p>';
    isValid = false;
  }
  if (!lastName) {
    errorMessagesDiv.innerHTML += '<p>Last Name is required.</p>';
    isValid = false;
  }
  if (!username) {
    errorMessagesDiv.innerHTML += '<p>User Name is required.</p>';
    isValid = false;
  }
  if (!password) {
    errorMessagesDiv.innerHTML += '<p>Password is required.</p>';
    isValid = false;
  }
  if (password !== confirmPassword) {
    errorMessagesDiv.innerHTML += '<p>Passwords do not match.</p>';
    isValid = false;
  }

  // If valid, submit the form
  if (isValid) {
    this.submit();
  }
});