<?php
namespace routing;

session_start();
if(!isset($_SESSION['userID']))
{
    header("Location: ../../index.php");
}
session_abort();

?>