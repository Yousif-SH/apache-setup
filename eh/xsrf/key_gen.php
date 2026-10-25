<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    //Generate a unique id based in the system time.
    //Note, that it might generate the same number of time in the system
    //goes back [1].
    $uid =  uniqid(); // user id from table users

    //Generation of cryptographically secure random bytes [2]
    //Note random is strong in PHP but it might strong in other langauges
    //Therefore, you need to read the doc or use a dedicated library like openssl
    $key_size = 64;
    $key_bytes = random_bytes(64);
    $key_hex = bin2hex($key_bytes);             //hex2bin to get it back
    $key_base64 = base64_encode($key_bytes);    //base64_decode to get it back

    
    //Generation a cryptographically strong pseudo-random string of bytes using SSL library
    //can be used for example for password, GPG etc [2] 
    $strong = true;
    $ssl_key_bytes = openssl_random_pseudo_bytes(64,$strong);
    $ssl_key_hex = bin2hex($ssl_key_bytes); 
    $ssl_key_base64 = base64_encode($ssl_key_bytes);    //base64_decode to get it back


    echo "<h1>Key generation </h1>";
    echo "uniqid : $uid <br/>";
    echo "Key size : $key_size <br/><br/>";

    echo "<h4>Random key </h4>";
    echo "Key bytes : $key_bytes <br/>";
    echo "Key hex : $key_hex <br/>";
    echo "Key base64 : $key_base64 <br/> <br/>";

    echo "<h4>SSL Key (Secure random)</h4>";
    echo "Key bytes : $ssl_key_bytes <br/>";
    echo "Key hex : $ssl_key_hex <br/>";
    echo "Key base64 : $ssl_key_base64 <br/>";



    //references:
    // [1] uniqid https://www.php.net/manual/en/function.uniqid.php
    // [2] openssl-random-pseudo-byte: https://www.php.net/manual/en/function.openssl-random-pseudo-bytes.php