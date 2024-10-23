
// Load login form from login.php
document.addEventListener('DOMContentLoaded', function () {
    fetch('login.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('login-form-container').innerHTML = data;
        })
        .catch(error => console.error('Error loading the login form:', error));
});