// Select the menu toggle button and the navigation links
const menuToggle = document.querySelector('.menu-toggle');
const navLinks = document.querySelector('.nav-links');

// Add an event listener to the menu toggle button
menuToggle.addEventListener('click', () => {
    // Toggle the 'nav-links-visible' class on the navigation links
    navLinks.classList.toggle('nav-links-visible');
});
