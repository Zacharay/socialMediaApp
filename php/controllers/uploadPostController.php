<?php

$response = array();
$uploadDir = '../../images/postPhotos/';

if(!empty($_FILES['selectedFiles']))
{
    foreach ($_FILES['selectedFiles']['tmp_name'] as $key => $tmpName) 
    {
        $fileName = $_FILES['selectedFiles']['name'][$key];
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
else{
    $response[] = array('status' => 'error', 'message' => 'No files were uploaded.');
}

header('Content-Type: application/json');
echo json_encode($response);
?>