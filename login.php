<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
<?php
    session_start();
    require_once('./read.php');
    require_once('./writing.php');
    require_once('./get_user_info.php');

    // Checks if the user inputted a valid email and its corresponding password
    // Checks if the user inputted a valid email and its corresponding password
    function validLoginInputs($inpEmail, $inpPword) {
        if(getPasswordByEmail($inpEmail) == $inpPword){
            return true;
        }
        return false;
    }

    // Checks if the inputted email is linked to an employee and the password is strong
    function valdiSignupInputs($inpEmail, $inpPword) {
        $employeeArray = csvToArray("./employees.csv");
        $registrationArray = csvToArray("./registrations.csv");

        // Check if the inputted email has already been used to sign up
        for ($lineNum = 0; $lineNum < count($registrationArray); $lineNum++) {
            if($registrationArray[$lineNum]['email'] == $inpEmail){
                return false;
            }
        }

        // Checks if the email is in the employees.csv file
        for ($lineNum = 0; $lineNum < count($employeeArray); $lineNum++) {
            if($employeeArray[$lineNum]['email'] == $inpEmail){
                // Checks password strength and the email is an employees
                if(getRoleByEmail($inpEmail) == "member" && strlen($inpPword) > 7 && preg_match('/[A-Z]/', $inpPword) && preg_match('/[a-z]/', $inpPword) &&  preg_match('/[\W_]/', $inpPword)){
                    return true;
                }
            }
        }
        return false;
    }

    // Calls the function to validate user inputs after the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])) {

        // Different function called depending on if the login or signup form was submitted
        if(isset($_POST['form_name']) && $_POST['form_name'] === 'login'){
            $email = $_POST['email'];
            $pword = $_POST['password'];
            if(validLoginInputs($email, $pword)){$id = getIdByEmail($email);
                $_SESSION["employee_id"] = $id;
                header('Location: main.php'); // Redirects from login in page to main page
                exit;
            }
        }
        elseif(isset($_POST['form_name']) && $_POST['form_name'] === 'signup'){
            $email = $_POST['signupEmail'];
            $pword = $_POST['signupPassword'];
            $validSignup = valdiSignupInputs($email, $pword);
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
