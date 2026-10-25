## XSRF attack
To start the attacks, login first as charlie

Go to : login.php
Email : charlie@gmail.com
Password:  P@ssword1

This will initiate the session for the user charlie

## Example 1 get: XSRF attack via url
Target : example1_get.php

The attacker can craft a URL like this that contain all the needed info.

http://localhost/sites/xsrf/example1_get.php?to_account=attacker&amount=100&url=&submit=

Then, send this link to charlie to steal 100 BD from his account. XSRF abuse the active session of charlie to initiate a request on hist behalf.

## Example 2,3 and 4
Target : example1_post.php 
Launch via
- example2.html : XSRF attack using iframe from another website.
- example3.html : XSRF attack using image from another website.
- example4.html : XSRF attack using script via <script> tag.

In these examples, the attacker create a different webpage and share its link with charlie. if charlie open the link. The web page in :
- Example 2: load the crafted URL as iframe
- Example 3: load the crafted URL as an image
- Example 4: load the crafted URL as a script tag.

## Different domains
In all these examples, the attack will work. Note, that it might not work in real life. Real systems used CORS protections which disallow websites from sending request to other websites. Assume the attacker domain was (attacker.com) and charlie use (mybank.com). Then, if mybank.com only accept requests coming from mybank.com. The example 2,3 and 4 will not work if they are hosted in (attacker.com).

### Same domain
Another work around, if example 2,3 and 4 placed as iframe, image and script in the same bank domain (mybank.com), for example, as a content (comment or post like social media). Then, they will work. 


## Example 1 post: XSRF attack using post request
Target : example1_post.php
Attacker launch via : example5.html

Example 5 show the same attack by using POST request. The attack works when charlie open the page example5.html. Note, that if example5.html is hosted in another domain and the bank system use CORS protection. Then, it might not work.

## Mitigations : Protections from XSRF attacks

Example 6: XSRF token using hash (token)
Example 7: XSRF token using hashmac (keyed token) 

Check keyGen.php for more secure key creations.