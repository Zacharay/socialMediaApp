<?php

$response = array();
include "../database.php";
session_start();

if(isset($_SESSION['userID']))
{
    $userID = $_SESSION['userID'];
    $upload_date = date("Y-m-d");
    $postContent = $_POST['postContent'];
    $photosCount = isset($_FILES['selectedFiles'])?count($_FILES['selectedFiles']['name']):0;

    $db = new Database();


    $queryStr = "INSERT INTO posts VALUES (null,$userID,'$postContent','$upload_date',$photosCount)";
    $db->actionQuery($queryStr);

    $postID = $db->getInsertId();

    if(!empty($_FILES['selectedFiles']))
    {
        $uploadDir = '../../images/postPhotos/';
        foreach ($_FILES['selectedFiles']['tmp_name'] as $key => $tmpName) 
        {
            $fileName = 'postPhoto--'.$postID.'_'.$key.'.png';
            $uploadPath = $uploadDir.$fileName;

            if (move_uploaded_file($tmpName, $uploadPath)) {
                $response[] = array('status' => 'success', 'message' => 'File uploaded successfully: ' . $fileName);
            } 
            else 
            {
                $response[] = array('status' => 'error', 'message' => 'File upload failed: ' . $fileName);
            }
        }
    }
}
else{
    $response[] = array('status' => 'error', 'message' => 'There is no user logged in');
}



header('Content-Type: application/json');
echo json_encode($response);
?>