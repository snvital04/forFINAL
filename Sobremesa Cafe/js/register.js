    // Bootstrap 5 form validation
    (function () {
        'use strict'
        var forms = document.querySelectorAll('.needs-validation')

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })();

      // Function to show/hide fields based on selected role
      document.getElementById("roleSelect").addEventListener("change", function() {
        var selectedRole = this.value;

        if (selectedRole == 5) { // Seller
            document.getElementById("sellerFields").style.display = "block";
        } else {
            document.getElementById("registrationForm").style.display = "block";
            document.getElementById("sellerFields").style.display = "none";
        }
    });