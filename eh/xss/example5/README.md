## XSSI - Cross-Site Script Inclusion:
Target: secret_api_key.php 

The `secret_api_key.php` contains a secret API key which cannot be retrieved unless the user login(i.e to the page by providing a valid username and password ).


## How the attacker will get the sceret
1. An attacker can create another page `attacker.html` that load the `secret_api_key.php` page as a script. 

2. The attacker send the page to the victim.

3. The victim first login to `secret_api_key.php`.

4. The vicitm open the attacker's page `attacker.html` which will abuse the active session of the page 
to load the content of `secret_api_key.php` and get the key. The attacker can add any code in step 1 to send the secret to him.

Please note, in real life, this attack may need some setup. It might not work if there are some protections.