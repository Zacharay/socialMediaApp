<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/loginForms.css">
    <title>Social Media App</title>
</head>
<body>
    <div class="loginBox-container">
        <h1 class="loginBox-title">SIGN UP</h1>
        <form class="login-form" method="POST" action="php/controllers/loginController.php">
            <input type="text" name="Name" class="loginBox-textInput" placeholder="Name">
            <input type="text" name="Surname" class="loginBox-textInput" placeholder="Surname">    
            <input type="text" name="Username" class="loginBox-textInput" placeholder="Username">
            <input type="email" name="Email" class="loginBox-textInput" placeholder="Email">
            <input type="password" name="Password" class="loginBox-textInput" placeholder="Password">
            <input type="password" name="Password" class="loginBox-textInput" placeholder="Confirm Password">
            <input type="text" name="Job" class="loginBox-textInput" placeholder="Enter your current occupation">
            <label class="loginBox-checkBox-label"><input type="checkbox" name="Remember" class="loginBox-checkBox" required>I accept Terms and Conditions</label>
            <input type="submit" value="Create account" class="loginBox-submit">
        </form>
    </div>
    <?php
        // include "config.php";
    ?> 
</body>
</html>