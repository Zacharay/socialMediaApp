<?php

$response = array();
session_start();
require_once "../Models/ConversationModel.php";
try {
    if (!isset($_SESSION['userID'])) {
        throw new Exception('There is no user logged in', 401);
    }
    $currentUserID = $_SESSION['userID'];
    $conversatiodID = $_POST['conversationID'];
    $conversatioModel = new ConversationModel();



    $messages = $conversatioModel->getAllConversationMessages($conversatiodID);
  

    $numOfMessages = count($messages);
    $data[] = array(
        'content'=>$messages[0]['content'],
        'uploadDate'=>$messages[0]['upload_date'],
        'isCurrentUserMessage'=>$messages[0]['sender_id']==$currentUserID?true:false,
        'senderID'=>$messages[0]['sender_id'],
        'isFirstUserMessage'=>true
    );


    for($i=1;$i<$numOfMessages;$i++)
    {
        $data[] = array(
            'content'=>$messages[$i]['content'],
            'uploadDate'=>$messages[$i]['upload_date'],
            'isCurrentUserMessage'=>$messages[$i]['sender_id']==$currentUserID?true:false,
            'senderID'=>$messages[$i]['sender_id'],
            'isFirstUserMessage'=>$messages[$i-1]['sender_id']!=$messages[$i]['sender_id']?true:false
        );
    }
    $response['status'] = 'success';
    $response['message'] = 'Action completed successfully';
    $response['data'] = $data;
}
catch(Exception $e){
    $response[] = array('status' => 'error', 'code' => $e->getCode(), 'message' => $e->getMessage());
    
}
header('Content-Type: application/json');
echo json_encode($response);
?>