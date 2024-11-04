// Get elements
const signupBtn = document.getElementById('signupBtn');
const loginPopup = document.getElementById('loginPopup');
const signupPopup = document.getElementById('signupPopup');
const closeButtons = document.querySelectorAll('.close');
const openSignup = document.getElementById('openSignup');
const openLogin = document.getElementById('openLogin');

document.addEventListener("DOMContentLoaded", function () { 
    const loginPopup = document.getElementById("loginPopup");
    const signupPopup = document.getElementById("signupPopup");
    const closeButtons = document.querySelectorAll(".close");

    // Show login popup by default
    loginPopup.style.display = 'flex';

    // Show signup popup and hide login popup when "Sign up" link is clicked
    document.getElementById("openSignup").onclick = function(event) {
        event.preventDefault(); // Prevent default link behavior
        loginPopup.style.display = 'none';
        signupPopup.style.display = 'flex';
    };

    // Show login popup and hide signup popup when "Login" link is clicked
    document.getElementById("openLogin").onclick = function(event) {
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

});
