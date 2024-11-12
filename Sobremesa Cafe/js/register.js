

 // Use Fetch API to load the login
 fetch('register.php')
 .then(response => {
     if (!response.ok) {
         throw new Error('Network response was not ok ' + response.statusText);
     }
     return response.text();
 })
 .then(data => {
     document.getElementById('register').innerHTML = data; // Insert the register into the div
 })
 .catch(error => console.error('Error loading register:', error));

