<?php 
    include "../database.php";

    $db = new Database();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["Username"];
        $enteredPassword = $_POST["Password"];

        $queryStr = "SELECT id,password  from users where users.username = '$username'";
        $result = $db->selectQuery($queryStr);
        $row =$result->num_rows ==1? $result->fetch_assoc():null;
        print_r(password_hash($enteredPassword,PASSWORD_DEFAULT));
        if ($row!=null && password_verify($enteredPassword,$row['password'])) {
           
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