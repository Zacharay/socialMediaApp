<?php
session_start();
if(isset($_SESSION['userID'])&&$_SERVER["REQUEST_METHOD"] == "POST")
{
    $userID =$_SESSION['userID'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $job =  $_POST['job'];
    $bio =  $_POST['bio'];

    require_once "../models/UserModel.php";

    $userModel = new UserModel();
    $userModel->updatePublicProfileData($userID,$name,$surname,$username,$job,$bio);
    header('Location: ../views/profileSettingsView.php');
}
else{
    header('Location: logoutController.php');
}
?>