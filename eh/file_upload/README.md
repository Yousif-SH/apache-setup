Example 1: Bypass extension restriction.

Step 1: Inspect the HTML to change the requested extension file and change it the type you want.
Step 2: Also, use inspect to change the max file size to 30000, something high so you can upload anything.
Step 3: Upload any file of that extension (webshell.php)


Example 2: Bypass content type

Step 1: Use Burp Proxy to intercept the traffic.
Step 2: Upload any file of that extension (webshell.php)
Step 3: Change content-type from application/php  to image/png

Note: content-type is determined by the extension of the file.

Example 3: Bypass mimetype php function.

Here, the trick is to combine a php file and image using cat:
//cat photo.png > photo_webshell.php
//cat webshell.php >> photo_webshell.php

The mime will check the first bytes which is image/png from the photo. Then the remaining half is php script
Which will be executed because the file has php extension. 

Example 4: XSS attack in file upload

The developer here, ensure to allow only images and HTML pages.
HTML is in issue if uploaded and loaded in the same domain.
An attacker could write a script that send a cookie to his website
-Upload (xss.html), then visit the page and watch the cookie from network tab in developer options (F12).