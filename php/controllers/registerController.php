<?php 

include "../database.php";

$db = new Database();

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

    if($result == '')
    {
        header("Location: ../views/uploadPhoto.php");
        exit;
    }
    else if(strstr($result,"Username"))
    {
        header("Location: ../views/registerForm.php?name=$name&surname=$surname&username=$username&email=$email&job=$job&error=usernameError");
        
        exit;
    }
    else if(strstr($result,"Email"))
    {
        header("Location: ../views/registerForm.php?name=$name&surname=$surname&username=$username&email=$email&job=$job&error=emailError");
        exit;
    }

}

?>