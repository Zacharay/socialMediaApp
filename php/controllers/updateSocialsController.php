<?php
session_start();
if(isset($_SESSION['userID'])&&$_SERVER["REQUEST_METHOD"] == "POST")
{
    $userID =$_SESSION['userID'];
    $facebookLink = $_POST['facebookLink'];
    $instagramLink = $_POST['instagramLink'];
    $linkedinLink = $_POST['linkedinLink'];
    $twitterLink =  $_POST['twitterLink'];

    require_once "../models/UserModel.php";

    $userModel = new UserModel();
    $userModel->updateSocialLinks($userID,$facebookLink,$instagramLink,$linkedinLink,$twitterLink);
    header('Location: ../views/profileSettingsView.php');
}
else{
    header('Location: logoutController.php');
}
?>