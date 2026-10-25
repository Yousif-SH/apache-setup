<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    include "../db_connection.php";


    if(isset($_POST['email'])){
        $email = $_POST['email'];
  
        try{
            $db = db_connect();
            //echo "SELECT * FROM items WHERE name = '".$name."' <br/>";
            $query = $db->prepare("SELECT email FROM users WHERE email = '".$email."'");
            $query->execute();
            $row_count = $query->rowCount();//Row count
        
            if($row_count >= 1){
                //send an email
            }
        }catch(Exception $e){
            //exception handling will catch any PHP/SQL error code -> error code will not be printed.
        }

        //generic message that an email might be sent
        $msg = "If your email exist, an email is sent to your email address to reset your password";

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

                <h1>Forget password </h1>

                <p> Enter your the email address that associated with your account. </p>
                <form method="post" >
                    <div class="input-group mb-3">
                        <input type="text" name='email' class="form-control" placeholder="example@email.com ... ">
                        <div class="input-group-append">
                            <input class="btn btn-primary" type='submit' value='Reset' />
                        </div>
                    </div>
                </form>


                

                <div style='color:blue;margin-top:20px;'>
                    <?php 
                        if(isset($msg)){
                            echo $msg; 
                        }
                    ?>
                </div>
            </div>
        </div>
     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>