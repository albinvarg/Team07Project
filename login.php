<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Popup</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <!-- Signup Button -->
     <button id="signupBtn">
        <img src="signup-icon.png" alt="Signup Icon">
    </button>

    <!-- Signup Popup -->
    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <h2>Sign Up</h2>
            <form>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script src="login.js"></script>
</body>
</html>
