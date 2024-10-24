document.addEventListener('DOMContentLoaded', function () {
  fetch('cart.php')
      .then(response => response.text())
      .then(data => {
          document.getElementById('cart-form-container').innerHTML = data;
      })
      .catch(error => console.error('Error loading the cart form:', error));
});