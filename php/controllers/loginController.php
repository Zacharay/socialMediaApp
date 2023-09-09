<?php 
    include "../database.php";

    $db = new Database();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["Username"];
        $password = $_POST["Password"];

        $queryStr = "SELECT UserID from users where users.Username = '$username' and users.Password = '$password'";
        $result = $db->selectQuery($queryStr);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userID = $row["UserID"];
            
            session_start();
            $_SESSION['userID'] = $userID;

            header("Location: ../views/userProfile.php");
            exit;

        } else {
            header("Location: ../views/loginForm.php?username=$username&error=true");
            exit;
        }
    }
?>