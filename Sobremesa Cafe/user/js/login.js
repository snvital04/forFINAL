

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