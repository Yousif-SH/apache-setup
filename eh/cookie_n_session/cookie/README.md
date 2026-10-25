# Example 1: How to create sessions and cookies

# Example 2: Bypass authentication.

The cookie is used to store the user id.
The attacker can go to the profile page (bypassing the login) and set the cookie to id of any users.
The id here is not secure is it use the id of table users.

# Example 3: Bypass authorization 

The profile page shows a secret code for admin users only. Here the id is a bit secure and cannot be predicted it by the attacker. The id is hashed with md5 with a fixed salt to prevent the attacker from using md5-look up.

However, the admin is stored in cookies as flag. The attacker can simply change the flag to 1 to be an admin
from Burp or from the browser developer option.
