<?php
/*
    The usage of prepared statement protect the system from sql injection.
    as you can see the data is not concantaned to the query. Instead it binded in the execution of query.
*/


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include "../db_connection.php";


    if(isset($_GET['name'])){

        $name = $_GET['name'];
        $price = $_GET['name'];
        $quantity = $_GET['quantity'];

        $db = db_connect();
        // Insert using  prepared statement: Prepare SQL query and excute it for item insertion
        $query = $db->prepare('INSERT INTO items (name, price, quantity) VALUES (?,?,?)');
        $query->execute([$name,$price,$quantity]);

        // Update using prepared statement
        $query = $db->prepare('UPDATE items set price=?, quantity=? where name=?');
        $query->execute([$price+100,$quantity,$name]);

        // DELETE using prepared statement
        // $query = $db->prepare('DELETE from items where name = ?');
        // $query->execute([$name]);

        // Select using prepared statement
        $query = $db->prepare('SELECT * from items where name = ? and quantity = ?');
        $query->execute([$name,$quantity]);

        $row_count = $query->rowCount();//Row count
        if($row_count > 0){

            // Fetch the user data
            $row = $query->fetch(PDO::FETCH_ASSOC);
            echo  "a record found !!";

        }

    }
?>
        