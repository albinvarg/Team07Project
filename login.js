// Get elements
const signupBtn = document.getElementById('signupBtn');
const popup = document.getElementById('popup');
const closeBtn = document.querySelector('.close');

// Show popup when signup button is clicked
signupBtn.onclick = function() {
    popup.style.display = 'flex';
};

// Hide popup when close button is clicked
closeBtn.onclick = function() {
    popup.style.display = 'none';
};

// Hide popup when clicking outside of the popup content
window.onclick = function(event) {
    if (event.target === popup) {
        popup.style.display = 'none';
    }
};
