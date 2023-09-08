<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/loginForm.css">
    <title></title>
</head>
<body>
    <?php  include "../controllers/registerController.php"?>
    <div class="loginBox-container">
        <h1 class="loginBox-title">SIGN UP</h1>
        <form class="login-form" method="POST" action="../controllers/registerController.php">
            <div class="login-form-wrapper">
                <input type="text" name="Name" class="loginBox-textInput" placeholder="Name">
                <span class="error-message" id="name-error"></span>
            </div>
            <div class="login-form-wrapper">
                <input type="text" name="Surname" class="loginBox-textInput" placeholder="Surname">
                <span class="error-message" id="surname-error"></span>  
            </div>
            <div class="login-form-wrapper">
                <input type="text" name="Username" class="loginBox-textInput " placeholder="Username">
                <span class="error-message" id="username-error"></span>  
            </div>
            <div class="login-form-wrapper">
                <input type="email" name="Email" class="loginBox-textInput" placeholder="Email">
                <span class="error-message" id="email-error"> </span>  
            </div>
            <input type="password" name="Password" class="loginBox-textInput" placeholder="Password">
            <div class="login-form-wrapper">
                <input type="password" name="Confirm_Password" class="loginBox-textInput" placeholder="Confirm Password">
                <span class="error-message" id="password-error"></span>  
            </div>
            
            
            <input type="text" name="Job" class="loginBox-textInput" placeholder="Enter your current occupation">
            <label class="loginBox-checkBox-label"><input type="checkbox" name="Remember" class="loginBox-checkBox" required>I accept Terms and Conditions</label>
            <input type="submit" value="Next" class="loginBox-submit">
        </form>
    </div>

    <script src="../../js/registerFormValidation.js"></script>
</body>
</html>