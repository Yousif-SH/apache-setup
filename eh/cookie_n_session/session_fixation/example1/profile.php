<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    //allow setting php session id via GET request ?PHPSESSID=1234
    //Note session will not visible in the developer console
    ini_set('session.use_only_cookies',0);

    include "db_connection.php";
    
    session_start();

    if(isset($_SESSION['id'])){

        $id = $_SESSION['id'];
        

        $db = db_connect();
        $query = $db->prepare("SELECT * FROM users WHERE id = ?");
        $query->execute([$id]);
        $row_count = $query->rowCount();//Row count

        if($row_count > 0){
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $role = $row['role'];

        }

        
    }else{

        $error_msg = "Invalid page, please go to login page.";
    }


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
        <div class='row'>
            <div class="col-4 offset-md-4" style='margin-top:100px'>

                <h1>Profile</h1>

                <div>
                    <?php 
                        if(isset($name)){
                            echo "Name : $name <br/>    Email : $email <br/> Role : $role <br/>";
                        }
                    ?>
                </div>

                <div style='color:red;margin-top:20px;'>
                    <?php 
                        if(isset($error_msg)){
                            echo $error_msg; 
                        }
                    ?>
                </div>
            </div>
        </div>
     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>