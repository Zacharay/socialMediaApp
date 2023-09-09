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
    <?php  
    include "../controllers/registerController.php";
    $nameValue = isset($_GET['name']) ? $_GET['name'] : '';
    $surnameValue = isset($_GET['surname']) ? $_GET['surname'] : '';
    $usernameValue = isset($_GET['username']) ? $_GET['username'] : '';
    $emailValue = isset($_GET['email']) ? $_GET['email'] : '';
    $jobValue = isset($_GET['job']) ? $_GET['job'] : '';
    $usernameError = isset($_GET['error']) && $_GET['error'] == 'usernameError' ? 'Username is already in use' : '';
    $emailError = isset($_GET['error']) && $_GET['error'] == 'emailError' ? 'Email is already in use' : '';
    ?>
    <div class="loginBox-container">
        <h1 class="loginBox-title">SIGN UP</h1>
        <form class="login-form" method="POST" action="../controllers/registerController.php">
            <div class="login-form-wrapper">
                <input type="text" name="Name" class="loginBox-textInput" placeholder="Name" value="<?= $nameValue ?>" >
                <span class="error-message" id="name-error"></span>
            </div>
            <div class="login-form-wrapper">
                <input type="text" name="Surname" class="loginBox-textInput" placeholder="Surname" value="<?= $surnameValue?>">
                <span class="error-message" id="surname-error"></span>  
            </div>
            <div class="login-form-wrapper">
                <input type="text" name="Username" class="loginBox-textInput <?= $usernameError ? 'loginForm-invalidInput' : '' ?>" placeholder="Username" value="<?= $usernameValue?>" />
                <span class="error-message" id="username-error">
                    <?= $usernameError ? 'Username is already in use' : '' ?>
                </span>  
            </div>
            <div class="login-form-wrapper">
                <input type="email" name="Email" 
                class="loginBox-textInput <?= $emailError ? 'loginForm-invalidInput' : '' ?>"
                placeholder="Email" 
                value="<?= $emailValue ?>">
                <span class="error-message" id="email-error"> 
                    <?= $emailError ? 'Username is already in use' : '' ?>
                </span>  
            </div>
            <input type="password" name="Password" class="loginBox-textInput" placeholder="Password">
            <div class="login-form-wrapper">
                <input type="password" name="Confirm_Password" class="loginBox-textInput" placeholder="Confirm Password">
                <span class="error-message" id="password-error"></span>  
            </div>
            
            
            <input type="text" name="Job" class="loginBox-textInput" placeholder="Enter your current occupation" value="<?=$jobValue ?>">
            <label class="loginBox-checkBox-label"><input type="checkbox" name="Remember" class="loginBox-checkBox" required>I accept Terms and Conditions</label>
            <input type="submit" value="Next" class="loginBox-submit">
        </form>
    </div>

    <script src="../../js/registerFormValidation.js"></script>
</body>
</html>