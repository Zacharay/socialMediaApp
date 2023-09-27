<?php

session_start();
require_once "../models/commentModel.php";
if($_SESSION['userID']&&isset($_POST['comment__content']))
{
    $userID = $_SESSION['userID'];
    $postID = $_GET['postID'];
    $commentContent = $_POST['comment__content'];
    echo $userID;
    echo $postID;
    echo $commentContent;

    $commentModel = new CommentModel();
    $commentModel->publishComment($userID,$postID,$commentContent);
}
else{
    header("Location: ../../index.php");
}

?>