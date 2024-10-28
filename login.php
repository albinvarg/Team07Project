<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup Switch</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Button to open login popup -->
    <button id="signupBtn">
        <img src="signup-icon.png" alt="Signup Icon">
    </button>

    <!-- Login Popup -->
    <div id="loginPopup" class="popup">
        <div class="popup-wrapper">
            <span class="close">&times;</span>
            <div class="popup-content">
                <h2 class="login-title">WELCOME</h2>
                <form id="loginForm">
                    <div class="wrap-input">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="input" required>
                    </div>
                    <div class="wrap-input">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="input" required>
                    </div>
                    <div class="container-btn">
                        <button class="login-btn" type="submit">Login</button>
                    </div>
                    <div class="container-text">
                        <span> Don't have an account? </span>
                        <a id="openSignup" class="txt2" href="#"> Sign up </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Signup Popup -->
    <div id="signupPopup" class="popup">
        <div class="popup-wrapper">
            <span class="close">&times;</span>
            <div class="popup-content">
                <h2 class="signup-title">Create Account</h2>
                <form>
                    <div class="wrap-input">
                        <label for="signupEmail">Email:</label>
                        <input type="email" id="signupEmail" name="signupEmail" class="input" required>
                    </div>
                    <div class="wrap-input">
                        <label for="signupPassword">Password:</label>
                        <input type="password" id="signupPassword" name="signupPassword" class="input" required>
                    </div>
                    <div class="container-btn">
                        <button class="signup-btn" type="submit">Sign Up</button>
                    </div>
                    <div class="container-text">
                        <span> Already have an account? </span>
                        <a id="openLogin" class="txt2" href="#"> Login </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="login.js"></script>
</body>
</html>
