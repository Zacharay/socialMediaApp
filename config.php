<?php 

$serverAddress = "localhost";
$username = "root" ;
$password = "";
$database = "socialmediaapp" ;

$connection = new mysqli($serverAddress,$username,$password,$database);

if($connection->connect_error)
{
    die("Failed to connect to the database".$connection->connect_error);
}

echo("Połącznie z bazą danych udane");

$text = "text";
?>