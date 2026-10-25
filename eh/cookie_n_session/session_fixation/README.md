## Example 1: Session fixation

### Before you start ..
- ?PHPSESSID= must be included in each URL to use it. if it is not exist, session_start() will create another session id. 
- if the login request use ?PHPSESSID=7777, but profile did not have it. Then, profile.php will create new session using session_start() which does not have any login information. However, the attacker already got the session 7777 and can view it from his browser.
- Ensure to delete any existing session cookie in cookie tab before start as it is possibile to fix the session from URL while there is already a session in the cookie.

###  Attack works as follow:
- Create a URL using custom session id as follow:
http://localhost/sites/cookie_n_session/session_fixation/example1/login.php?PHPSESSID=7777

1. This will prevent the session_start() from creating a session id and it will use yours (in this case it will be 7777). Note, if the PHPSESSID is missing from the URL. session_start() will create random session instead which will prevent the attack. You have to delete it from the cookies tab in F12. 

2. Login with user using its credentials
    charlie@gmail.com / P@ssword1

3. After successful login, the attacker from another tab can open this url with fixed session id which will have the victim's session.
http://localhost/sites/cookie_n_session/session_fixation/example1/profile.php?PHPSESSID=7777

### Example 2: Testing session fixation across multiple browsers

Before you start, make sure to delete any existing session cookies in the browser from F12 -> storage -> cookie.

Open the following link from any browser/ incognito tab and so on. You will notice in each refresh in any browser the counter is increasing.

http://localhost/sites/cookie_n_session/session_fixation/example2/index.php?PHPSESSID=7777

