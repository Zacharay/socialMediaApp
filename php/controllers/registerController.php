<?php 

include "../models/UserModel.php";




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["Name"];
    $surname = $_POST["Surname"];
    $username = $_POST["Username"];
    $email = $_POST["Email"];
    $password = $_POST["Password"];
    $job = $_POST["Job"];

   

    $userModel = new UserModel($db);

    if($userModel->doesUsernameExists(($username)))
    {
        header("Location: ../views/registerForm.php?name=$name&surname=$surname&username=$username&email=$email&job=$job&error=usernameError");
        exit;
    }

    if($userModel->doesEmailExists(($email)))
    {
        header("Location: ../views/registerForm.php?name=$name&surname=$surname&username=$username&email=$email&job=$job&error=emailError");
        exit;
    }

    $result = $userModel->registerUser($name,$surname,$username,$email, $password,$job);

    if($result)
    {
        $userID = $userModel->getLastInsertId();
        session_start();
        $_SESSION['userID'] = $userID;

       
        header("Location: ../views/uploadPhoto.php");
        exit;
    }
    else{
        echo "Registration failed";
    }

}

?>