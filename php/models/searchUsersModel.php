<?php 

$response = array();

$dsn = "mysql:host=localhost;dbname=socialmediaapp;charset=utf8mb4";
$username = "root";
$password = "";
$userInput = $_POST['searchQuery'];

$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable PDO exceptions.

$queryStr = "SELECT users.id, users.name, users.surname FROM users WHERE CONCAT(users.name, users.surname) LIKE :user_input";

$stmt = $pdo->prepare($queryStr);
$userInput = '%' . $userInput . '%'; // Add wildcard characters to search for partial matches
$stmt->bindParam(':user_input', $userInput, PDO::PARAM_STR);
$stmt->execute();

$data = array(); 

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = array(
        'id' => $row['id'],
        'name' => $row['name'],
        'surname' => $row['surname']
    );
}

$response['status'] = 'success';
$response['message'] = 'Action completed successfully';
$response['data'] = $data;
// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>