<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

//allow setting php session id via GET request ?PHPSESSID=1234
//Note session will not visable in the developer console
ini_set('session.use_only_cookies',0);
//ini_set("session.use_trans_sid", 0);

session_start();

if(isset($_SESSION['counter'])){
    $_SESSION['counter'] = $_SESSION['counter'] + 1;
}else{
    $_SESSION['counter'] = 0;
}

echo $_SESSION['counter'];
print "<pre>";
print_r($_SESSION);
print_r($_COOKIE);
print "</pre>";
phpinfo();
?>

