<?php
function generateVerificationToken($tokenLength =6)
{
    return substr(str_shuffle("0123456789"), 0, $tokenLength);
}

$response = array();
session_start();
require_once "../models/UserModel.php";
try {
    if (!isset($_SESSION['userID'])) {
        throw new Exception('There is no user logged in', 401);
    }

    $userID = $_SESSION['userID'];
   
    $userModel = new UserModel();
    $verificationCode = generateVerificationToken();
    $userEmail = $userModel->getUserEmailByID($userID);


    // Email details
    $to = $userEmail;
    $subject = 'Verification Code';
    $message = 'Your verification code is: ' . $verificationCode;
    $headers = 'From: myMedia@example.com' . "\r\n" .
    'Reply-To: your_email@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        $response[] = array('status' => 'success', 'message' => 'Email sent succesfully');
    } else {
        throw new Exception("Failed to send email");
    }
    
} catch (Exception $e) {
    $response[] = array('status' => 'error', 'code' => $e->getCode(), 'message' => $e->getMessage());
}

header('Content-Type: application/json');
echo json_encode($response);
?>