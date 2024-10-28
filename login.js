// Get elements
const signupBtn = document.getElementById('signupBtn');
const loginPopup = document.getElementById('loginPopup');
const signupPopup = document.getElementById('signupPopup');
const closeButtons = document.querySelectorAll('.close');
const openSignup = document.getElementById('openSignup');
const openLogin = document.getElementById('openLogin');

// Show login popup when the main signup button is clicked
signupBtn.onclick = function() {
    loginPopup.style.display = 'flex';
};

// Show signup popup and hide login popup when "Sign up" link is clicked
openSignup.onclick = function(event) {
    event.preventDefault(); // Prevent default link behavior
    loginPopup.style.display = 'none';
    signupPopup.style.display = 'flex';
};

// Show login popup and hide signup popup when "Login" link is clicked
openLogin.onclick = function(event) {
    event.preventDefault();
    signupPopup.style.display = 'none';
    loginPopup.style.display = 'flex';
};

// Close popups when close button is clicked
closeButtons.forEach(button => {
    button.onclick = function() {
        loginPopup.style.display = 'none';
        signupPopup.style.display = 'none';
    };
});
document.addEventListener("DOMContentLoaded", function () { 
    const loginForm = document.getElementById("loginForm");
    
    loginForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form behavior

        const formData = new FormData(loginForm); // Access form data
        alert(formData.get("email"));
    });
});

// Close popups when clicking outside the popup content
window.onclick = function(event) {
    if (event.target === loginPopup) {
        loginPopup.style.display = 'none';
    } else if (event.target === signupPopup) {
        signupPopup.style.display = 'none';
    }
};
