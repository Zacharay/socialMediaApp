<?php

$response = array();
session_start();

try {
    if (!isset($_SESSION['userID'])) {
        throw new Exception('There is no user logged in', 401);
    }

    $currentUserID = $_SESSION['userID'];
    $userID = isset($_POST['userID']) ? intval($_POST['userID']) : 0; // Validate and sanitize user input.
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    if (empty($action)) {
        throw new Exception('Invalid action', 400);
    }

    $dsn = "mysql:host=localhost;dbname=socialmediaapp;charset=utf8mb4";
    $username = "root";
    $password = "";

    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable PDO exceptions.

    if ($action === 'follow') {
        $queryStr = "INSERT INTO follows (follower_id, following_id) VALUES (:currentUserID, :userID)";
    } elseif ($action === 'unfollow') {
        $queryStr = "DELETE FROM follows WHERE follower_id = :currentUserID AND following_id = :userID";
    } else {
        throw new Exception('Invalid action', 400);
    }

    $stmt = $pdo->prepare($queryStr);
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt->bindParam(':currentUserID', $currentUserID, PDO::PARAM_INT);

    $stmt->execute();

    $response[] = array('status' => 'success', 'message' => 'Action completed successfully'.$userID.' '.$currentUserID);
} catch (Exception $e) {
    $response[] = array('status' => 'error', 'code' => $e->getCode(), 'message' => $e->getMessage());
    error_log('Error: ' . $e->getMessage()); // Log the error.
}

header('Content-Type: application/json');
echo json_encode($response);
?>