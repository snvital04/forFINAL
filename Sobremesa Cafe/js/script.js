const scrollContent = document.getElementById('scrollContent');
let isDragging = false;
let startX;
let scrollLeft;

// Mouse down event
scrollContent.addEventListener('mousedown', (e) => {
    isDragging = true;
    scrollContent.style.cursor = 'grabbing'; // Change cursor to grabbing
    startX = e.pageX - scrollContent.offsetLeft; // Get the starting X position
    scrollLeft = scrollContent.scrollLeft; // Get the current scroll position
});

// Mouse leave event
scrollContent.addEventListener('mouseleave', () => {
    isDragging = false; // Stop dragging
    scrollContent.style.cursor = 'grab'; // Change cursor back to grab
});

// Mouse up event
scrollContent.addEventListener('mouseup', () => {
    isDragging = false; // Stop dragging
    scrollContent.style.cursor = 'grab'; // Change cursor back to grab
});

// Mouse move event
scrollContent.addEventListener('mousemove', (e) => {
    if (!isDragging) return; // If not dragging, exit function
    e.preventDefault(); // Prevent default behavior
    const x = e.pageX - scrollContent.offsetLeft; // Get the current X position
    const walk = (x - startX) * 2; // Calculate how far to scroll (multiplied for speed)
    scrollContent.scrollLeft = scrollLeft - walk; // Set the new scroll position
});

// Scroll buttons functionality
const scrollAmount = 200; // Adjust this value for how much to scroll

document.getElementById('scrollRightButton').addEventListener('click', () => {
    scrollContent.scrollBy({
        left: scrollAmount,
        behavior: 'smooth'
    });
});

document.getElementById('scrollLeftButton').addEventListener('click', () => {
    scrollContent.scrollBy({
        left: -scrollAmount,
        behavior: 'smooth'
    });
});


 // Use Fetch API to load the header
 fetch('header.php')
 .then(response => {
     if (!response.ok) {
         throw new Error('Network response was not ok ' + response.statusText);
     }
     return response.text();
 })
 .then(data => {
     document.getElementById('header').innerHTML = data; // Insert the header into the div
 })
 .catch(error => console.error('Error loading header:', error));