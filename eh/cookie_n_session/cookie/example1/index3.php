<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

session_start();

$_SESSION['id'] = 1234;
$_SESSION['name'] = "Ahmed";

// $_SESSION[0] = 123456;

var_dump($_SESSION);

echo "<br/> session id=".session_id()." name = ".$_SESSION['name']."<br/>";


//session_destroy();

setcookie("admin","1",time()+3600);
setcookie("password","mypassword",time()+3600);

echo "<br/>  cookie = ".$_COOKIE['password']."<br/>";

?>