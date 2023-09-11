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
<div class="login__container">
        <h1 class="login__title">SIGN IN</h1>
        <form class="login__form" method="POST" action="../controllers/loginController.php">
            <input type="text" name="Username" class="login__textinput <?= isset($_GET['error']) ? 'login__invalid--input' : '' ?>" placeholder="Username" value = "<?= isset($_GET['username']) ? $_GET['username'] : '' ?>">
            <input type="password" name="Password" class="login__textinput <?= isset($_GET['error']) ? 'login__invalid--input' : '' ?>" placeholder="Password">
            <label class="login__checkbox--label"><input type="checkbox" name="Remember" class="loginBox-checkBox">Remember me</label>
            <span class="login__error--message" id="password-error"><?= isset($_GET['error']) ? 'There is no user with such data' : '' ?></span>  
            <input type="submit" value="Sign in" class="btn--primary">
        </form>
    </div>
</body>
</html>