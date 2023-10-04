<?php 
    include "../models/UserModel.php";
    
    $userModel = new UserModel($db);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["Username"];
        $enteredPassword = $_POST["Password"];
        $rememberMe = isset($_POST['Remember'])?true:false;

        $userID = $userModel->loginUser($username, $enteredPassword);
    
        if ($userID !== false) {
            session_start();
            $_SESSION['userID'] = $userID;
            if($rememberMe)
            {
                $_COOKIE = setcookie('userID',$userID,time() + (86400 * 30),'/');
            }
            header("Location: ../views/mainView.php");
            exit;
        } else {
            header("Location: ../views/loginForm.php?username=$username&error=true");
            exit;
        }
    }
?>