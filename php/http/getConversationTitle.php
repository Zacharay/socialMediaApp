<?php

$response = array();
session_start();
require_once "../Models/ConversationModel.php";
try {
    if (!isset($_SESSION['userID'])) {
        throw new Exception('There is no user logged in', 401);
    }
    
    $currentUserID = $_SESSION['userID'];
    $conversationID = $_POST['conversationID'];

    $conversationModel = new ConversationModel();
    $conversationModel->getConversationTitle($conversationID,$currentUserID);

    $response['status'] = 'success';
    $response['message'] = 'Action completed successfully';

}
catch(Exception $e){
    $response[] = array('status' => 'error', 'code' => $e->getCode(), 'message' => $e->getMessage());
    
}
header('Content-Type: application/json');
echo json_encode($response);
?>