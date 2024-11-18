
  document.addEventListener('DOMContentLoaded', function () {
    const editButton = document.getElementById('editButton');
    const saveButton = document.getElementById('saveButton');
    const cancelButton = document.getElementById('cancelButton');
    const inputs = document.querySelectorAll('#profileForm input, #profileForm textarea');

    editButton.addEventListener('click', function () {
      // Enable input fields
      inputs.forEach(input => {
        input.disabled = false;
      });
      // Show Save and Cancel buttons
      saveButton.style.display = 'inline-block';
      cancelButton.style.display = 'inline-block';
      // Hide Edit button
      editButton.style.display = 'none';
    });

    cancelButton.addEventListener('click', function () {
      // Disable input fields
      inputs.forEach(input => {
        input.disabled = true;
      });
      // Hide Save and Cancel buttons
      saveButton.style.display = 'none';
      cancelButton.style.display = 'none';
      // Show Edit button
      editButton.style.display = 'inline-block';
    });
  });

  document.getElementById('confirmSubmit').onclick = function() {
    // Show loading spinner
    document.getElementById('loading').style.display = 'block';
    // Submit the form
    document.getElementById('uploadForm').submit();
};

function showUserModal() {
  const userModal = new bootstrap.Modal(document.getElementById('updateUser'));
  userModal.show();
}// Check if the URL contains the showLoginModal parameter
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.has('showUserModal') && urlParams.get('showUserModal') === 'true') {
  showUserModal();
}