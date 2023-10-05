<?php

$response = array();
session_start();

try {
    if (!isset($_SESSION['userID'])) {
        throw new Exception('There is no user logged in', 401);
    }
    $userID = $_SESSION['userID'];
    $postID = $_POST['postID'];
   
    require_once "../models/LikeModel.php";

    $likeModel = new LikeModel();
    $likeModel->insertLike($postID,$userID);
}
catch (Exception $e) {
        $response[] = array('status' => 'error', 'code' => $e->getCode(), 'message' => $e->getMessage());
 }
header('Content-Type: application/json');
echo json_encode($response);
?>