
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