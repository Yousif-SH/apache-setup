<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

//The following setting will make the session cookie (PHPSESSID in php) unreadable by javascript 
//-> This prevention XSS attack from stealing the user session cookie
ini_set('session.cookie_httponly',1);

//This line will estalish a session
//it will create the cookie session (PHPSESSID in php)
session_start();

echo "<h4>Sessions</h4>";
//To print the cookie session id using PHP
echo "Session id: ".session_id()."<br/>";

//To save session data, you can do it as follow
$_SESSION['id'] = 1234;
$_SESSION['name'] = "Ahmed";

//You can print them all using var_dump() as follow:
var_dump($_SESSION);

//or per record
echo "<br/>Session name :".$_SESSION['name']."<br/><br/>";


echo "<h4>Cookies</h4>";
//Creating some cookies and set their expiration date to the next one hour 
//Note that these cookies are not http only, so it is possibile to read them
//via javascript
setcookie("mypassword", "password", time() + 3600);
setcookie("admin", "1", time() + 3600);

//However, this cookie will use httponly.
//It cannot be read using Javascript.
setcookie("secret", "1984253",  time() + 3600, "", "", "", "true");



//vardump() can be used to print all the content of an array.
//It can be used to print $_COOKIE array to print all the cookies data
var_dump($_COOKIE);

//or per record
echo "<br/>Mypassword Cookie :".$_COOKIE['mypassword']."<br/><br/>";


// phpinfo() will show you all the current setting of php server
phpinfo();
//You might notice in the default setup that 'session.cookie_httponly' is
//not set to true(1) which mean it is possible to read the PHPSESSID session cookie
//by Javascript. Therefore, it is better to set it to 1.
?>


<script>
//This command is used to print the cookie data using javaScript in
//F12 developer console. You will notice that http only cookies are not
//printable
console.log(document.cookie);
</script>
