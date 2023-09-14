<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadDirectory = '../../images/profilePhotos/';
    $uploadedFile = $_FILES['profilePhoto'];
    session_start();
    $userId = isset($_SESSION["userID"])?$_SESSION["userID"]:-1;
    if ($uploadedFile['error'] === 0&&$userId!= -1) {
        $maxFileSize = 2 * 1024 * 1024; // 2MB
        

        
        $uniqueFilename = 'userPhoto_' . $userId . '.png';
        $destination = $uploadDirectory . $uniqueFilename;

        $mime = mime_content_type($uploadedFile['tmp_name']);
        $allowedMimes = ['image/jpeg', 'image/png'];

        if ($uploadedFile['size'] <= $maxFileSize) {
            
            if (in_array($mime, $allowedMimes)) {
                move_uploaded_file($uploadedFile['tmp_name'], $destination);
                header("Location: ../views/mainView.php");
            } else {
                echo 'Invalid file type. Please upload a valid image (JPEG, PNG).';
            }
        } else {
            echo 'File size is too large. Please upload a smaller file (max ' . ($maxFileSize / 1024 / 1024) . 'MB).';
        }
    } else {
        echo 'Error uploading file: ' . $uploadedFile['error'];
    }
}
?>