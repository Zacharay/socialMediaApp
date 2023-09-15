<?php 
    include "../database.php";

    $db = new Database();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["Username"];
        $password = $_POST["Password"];

        $queryStr = "SELECT id from users where users.username = '$username' and users.password = '$password'";
        $result = $db->selectQuery($queryStr);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userID = $row["id"];
            
            session_start();
            $_SESSION['userID'] = $userID;

            header("Location: ../views/mainView.php");
            exit;

        } else {
            header("Location: ../views/loginForm.php?username=$username&error=true");
            exit;
        }
    }
?>