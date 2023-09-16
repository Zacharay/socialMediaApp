<?php

$response = array();
session_start();

try {
    if (!isset($_SESSION['userID'])) {
        throw new Exception('There is no user logged in', 401);
    }

    $userID = $_SESSION['userID'];
    $upload_date = date("Y-m-d");
    $postContent = $_POST['postContent'];

    $photosCount = isset($_FILES['selectedFiles']) ? count($_FILES['selectedFiles']['name']) : 0;

       

    $dsn = "mysql:host=localhost;dbname=socialmediaapp;charset=utf8mb4";
    $username = "root";
    $password = "";

    $pdo = new PDO($dsn, $username, $password);
    $queryStr = "INSERT INTO posts (id, user_id, content, upload_date, photos_count, likes) VALUES (null, :userID, :postContent, :uploadDate, :photosCount, 0)";

    
    $stmt = $pdo->prepare($queryStr);
    $stmt->bindParam(':userID', $userID);
    $stmt->bindParam(':postContent', $postContent);
    $stmt->bindParam(':uploadDate', $upload_date);
    $stmt->bindParam(':photosCount', $photosCount);

    $stmt->execute();

    
    $postID = $pdo->lastInsertId();

    if (!empty($_FILES['selectedFiles'])) {
        $uploadDir = '../../images/postPhotos/';
        foreach ($_FILES['selectedFiles']['tmp_name'] as $key => $tmpName) {
            $fileName = 'postPhoto--' . $postID . '_' . $key . '.png';
            $uploadPath = $uploadDir . $fileName;

            if (move_uploaded_file($tmpName, $uploadPath)) {
                $response[] = array('status' => 'success', 'message' => 'File uploaded successfully: ' . $fileName);
            } else {
                throw new Exception('File upload failed: ' . $fileName, 500);
            }
        }
    }
    else {
        $response[] = array('status' => 'success', 'message' => 'No files were uploaded.');
    }
} catch (Exception $e) {
    $response[] = array('status' => 'error', 'code' => $e->getCode(), 'message' => $e->getMessage());
}

header('Content-Type: application/json');
echo json_encode($response);
?>