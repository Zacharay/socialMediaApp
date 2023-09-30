<?php
session_start();
require_once "../models/commentModel.php";
if(isset($_SESSION['userID'])&&isset($_GET['commentID']))
{
    $commentID=$_GET['commentID'];
    $userID = $_SESSION['userID'];
    $postID = $_GET['postID'];
    $commentModel = new CommentModel();

    $commentModel->deleteComment($userID,$commentID);
    header("Location: ../views/postView.php?postID=".$postID);
}

?>