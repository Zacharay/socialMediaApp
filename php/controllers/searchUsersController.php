<?php 
require_once "../models/UserModel.php";
$response = array();


$userInput = $_POST['searchQuery'];

$userModel = new UserModel();
$data = $userModel->searchUsers($userInput); 

$response['status'] = 'success';
$response['message'] = 'Action completed successfully';
$response['data'] = $data;

header('Content-Type: application/json');
echo json_encode($response);
?>