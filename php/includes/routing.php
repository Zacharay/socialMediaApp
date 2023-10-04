<?php
namespace routing;

session_start();
if(isset($_COOKIE['userID']) && !isset($_SESSION['userID']))
{
     $_SESSION['userID'] = $_COOKIE['userID'];
}

if(!isset($_SESSION['userID']))
{
    header("Location: ../../index.php");
    
}





?>