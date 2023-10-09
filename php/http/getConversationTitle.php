<?php

$response = array();
session_start();
require_once "../Models/ConversationModel.php";
require_once "../Models/UserModel.php";
try {
    if (!isset($_SESSION['userID'])) {
        throw new Exception('There is no user logged in', 401);
    }
    
    $currentUserID = $_SESSION['userID'];
    $conversationID = $_POST['conversationID'];
    $conversationUserID = $_POST['conversationUserID'];

    $conversationModel = new ConversationModel();
    $data =$conversationModel->getConversationTitle($conversationID);
    if($data==null)
    {
        $userModel = new UserModel();
        $response['data'] = $userModel->getUserFullnameByID($conversationUserID)['fullname'];
    }
    else{
        foreach($data as $record)
        {
            if($record['id']!=$currentUserID){
                $response['data']=$record['fullname'];
            }
        }
    }


    $response['status'] = 'success';
    $response['message'] = 'Action completed successfully';

}
catch(Exception $e){
    $response[] = array('status' => 'error', 'code' => $e->getCode(), 'message' => $e->getMessage());
    
}
header('Content-Type: application/json');
echo json_encode($response);
?>