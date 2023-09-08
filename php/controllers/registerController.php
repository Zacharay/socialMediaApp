<?php 

include "../database.php";

$db = new Database();
$usernameError;
$emailError;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["Name"];
    $surname = $_POST["Surname"];
    $username = $_POST["Username"];
    $email = $_POST["Email"];
    $password = $_POST["Password"];
    $job = $_POST["Job"];

    echo "Name: " . $name . "<br>";
    echo "Surname: " . $surname . "<br>";
    echo "Username: " .$username . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Password: " . $password . "<br>";
    echo "Password: " . $job . "<br>";

    $queryStr = "INSERT INTO users VALUES (NULL,'$username','$email','$password','$name','$surname','$job')";
    $result = $db->actionQuery($queryStr);
    
    $usernameError = '';
    $emailError  = '';

    if($result == '')
    {
        header("Location: ../views/uploadPhoto.php");
        exit;
    }
    else if(strstr($result,"Username"))
    {
        $usernameError = 'Username is already in use';
        header("Location: ../views/registerForm.php");
        
        exit;
    }
    else if(strstr($result,"Email"))
    {
        $emailError = 'Email is already in use';
        header("Location: ../views/registerForm.php");
        exit;
    }

}

?>