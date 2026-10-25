These examples are based on Burp Academy
https://portswigger.net/web-security/file-path-traversal 

Example 1: 
The objective of example 1 is to read secret.txt file. 
To start with inspect the web page or view its source.
You will notice that apple.jpg stored in files directory.

From this point, you can simply visit the /files to see what files are there.

Answer:
Yes, it will be
http://localhost/www/sites/eh/path_traversal/files/secret.txt

Example 2:

In example 2, the user can supply a file name to load the file from server

This url: http://localhost/www/sites/eh/path_traversal/example2.php?filename=apple.jpg
will display the apple image.

While this :http://localhost/www/sites/eh/path_traversal/example2.php?filename=orange.jpg
will display the orange image.

Note, the application ensure that the loaded file must be ending with .jpg file extension to determine that it is an image. Otherwise, it will not load it.

Can you find a way to load the secret.txt file.?

Answer:
load the file as follow:
http://localhost/www/sites/eh/path_traversal/example2.php?filename=secret.txt?q=.jpg

The image path is ending with .jpg (secret.txt?q=.jpg). This will bypass the validation.
Then, the <img> tag will load <img src="files/secret.txt?q=.jpg"> . This will load the secret.txt file. What about the q=.jpg. The server will make a GET request to the file using q variable which will not affect rendering of the file.

Example 3:
In this example, the PHP file does not load the file using its path in <img src="">. Instead, it read the content of the file and encode them as base64 to display them in  <img src="">. Loading data like this prevent loading the file through GET request. Because, this time, PHP use GET request in file_get_contents() to read the data of the file and simply display them.

Examine the page using view-source. You will notice that the URL is replaced with base64 encoding of the picture.

Answer:
view-source:http://localhost/www/sites/eh/path_traversal/example3.php?filename=secret.txt

This will yield that base64 encoding of the secret.txt file. You can then decode it.

http://localhost/www/sites/eh/path_traversal/example3.php?filename=../../../../../../../../etc/passwd

You can also, access other files in the system like passwd file (which is the password files of the current system. The password is not there but at least you can see the current users).
The path might be different in your machine but not that (../) mean go one directory back.
Note passwd file is stored in /etc/passwd.


Example 4:
Shows the mitigation by checking the file path of the requested file.

References
Apple picture : Photo by Louis Hansel on Unsplash
URL:https://unsplash.com/photos/red-apple-fruit-on-blue-surface-MardkT836BU?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash
Photo by <a href="https://unsplash.com/@louishansel?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Louis Hansel</a> on <a href="https://unsplash.com/photos/red-apple-fruit-on-blue-surface-MardkT836BU?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>

Orange picture: Photo by Mae Mu on Unsplash
URL : https://unsplash.com/photos/orange-fruit-U1iYwZ8Dx7k?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash
Photo by <a href="https://unsplash.com/@picoftasty?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Mae Mu</a> on <a href="https://unsplash.com/photos/orange-fruit-U1iYwZ8Dx7k?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>
  
  


References
Apple picture : Photo by Louis Hansel on Unsplash
URL:https://unsplash.com/photos/red-apple-fruit-on-blue-surface-MardkT836BU?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash
Photo by <a href="https://unsplash.com/@louishansel?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Louis Hansel</a> on <a href="https://unsplash.com/photos/red-apple-fruit-on-blue-surface-MardkT836BU?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Unsplash</a>

Orange picture: Photo by Mae Mu on Unsplash
URL : https://unsplash.com/photos/orange-fruit-U1iYwZ8Dx7k?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash
Photo by <a href="https://unsplash.com/@picoftasty?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplash">Mae Mu</a> on <a href="https://unsplash.com/photos/orange-fruit-U1iYwZ8Dx7k?utm_content=creditCopyText&utm_medium=referral&utm_source=unsplas