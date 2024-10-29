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

    <?php
    require_once('./read.php');
    require_once('./writing.php');

    // Checks if the user inputted a valid email and its corresponding password
    function validInputs($inpEmail, $inpPword) {
        $registrationArray = csvToArray("registrations.csv");

        // Loops through registration.csv
        for ($lineNum = 0; $lineNum < count($registrationArray); $lineNum++) {
            if($registrationArray[$lineNum]['email'] == $inpEmail && $registrationArray[$lineNum]['password'] == $inpPword){
                return true;
            }
        }
        return false;
    }

    // Checks if the user inputted a unique email
    function uniqueEmail($inpEmail) {
        $registrationArray = csvToArray("registrations.csv");

        // Loops through registration.csv
        for ($lineNum = 0; $lineNum < count($registrationArray); $lineNum++) {
            if($registrationArray[$lineNum]['email'] == $inpEmail){
                return false;
            }
        }
        return true;
    }

    // Calls the function to validate user inputs after the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])) {

        // Different function called depending on if the login or signup form was submitted
        if(isset($_POST['form_name']) && $_POST['form_name'] === 'login'){
            $email = $_POST['email'];
            $pword = $_POST['password'];
            $validLogin = validInputs($email, $pword);
        }
        elseif(isset($_POST['form_name']) && $_POST['form_name'] === 'signup'){
            $email = $_POST['signupEmail'];
            $pword = $_POST['signupPassword'];
            $validSignup = uniqueEmail($email);
            if($validSignup){
                addRegistration($email, $pword);
            }
        }
    }
    ?>

    <!-- Login Popup -->
    <div id="loginPopup" class="popup">
        <div class="popup-wrapper">
            <span class="close">&times;</span>
            <div class="popup-content">
                <h2 class="login-title">WELCOME</h2>
                <form method="POST" action="login.php">
                    <input type="hidden" name="form_name" value="login">
                    <div class="wrap-input">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" class="input" required>
                    </div>
                    <div class="wrap-input">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="input" required>
                    </div>
                    <div class="container-btn">
                        <button class="login-btn" type="submit" name="submit">Login</button>
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
                <form method="POST" action="login.php">
                <input type="hidden" name="form_name" value="signup">
                    <div class="wrap-input">
                        <label for="signupEmail">Email:</label>
                        <input type="email" id="signupEmail" name="signupEmail" class="input" required>
                    </div>
                    <div class="wrap-input">
                        <label for="signupPassword">Password:</label>
                        <input type="password" id="signupPassword" name="signupPassword" class="input" required>
                    </div>
                    <div class="container-btn">
                        <button class="signup-btn" type="submit" name="submit">Sign Up</button>
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
