<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/loginForm.css">
    <title>Document</title>
</head>
<body>
<div class="loginBox-container">
        <h1 class="loginBox-title">SIGN IN</h1>
        <form class="login-form" method="POST" action="../controllers/loginController.php">
            <input type="text" name="Username" class="loginBox-textInput <?= isset($_GET['error']) ? 'loginForm-invalidInput' : '' ?>" placeholder="Username" value = "<?= isset($_GET['username']) ? $_GET['username'] : '' ?>">
            <input type="password" name="Password" class="loginBox-textInput <?= isset($_GET['error']) ? 'loginForm-invalidInput' : '' ?>" placeholder="Password">
            <label class="loginBox-checkBox-label"><input type="checkbox" name="Remember" class="loginBox-checkBox">Remember me</label>
            <span class="error-message" id="password-error"><?= isset($_GET['error']) ? 'There is no user with such data' : '' ?></span>  
            <input type="submit" value="Sign in" class="loginBox-submit">
        </form>
    </div>
</body>
</html>