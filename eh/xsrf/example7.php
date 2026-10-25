<?php

    //xsrf protection using hmac
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    include "db_connection.php";

    
    
    session_start();

    if(isset($_POST['submit'])){

        $status = true;
        $error_msg = "";

        //if the form submitted, verify the hash
        if($_SESSION['xsrf_token'] != $_POST['xsrf_token']){
            $status = false;
            $error_msg = "Invalid xsrf token!";
        }


        

        //check all validation and default to deny
        if($status){

            $from = $_SESSION['id'];
            $to = $_POST['to_account'];
            $amount = $_POST['amount'];
            $url = $_POST['url'];

            $db = db_connect();

            //reduce from_account amount and send to_account the amount. We are doing it two queries together
            $query = $db->prepare('UPDATE users set amount=amount-? where id =?; UPDATE users set amount=amount+? where name =?');
            $query->execute([$amount,$from,$amount,$to]);
            
            $error_msg = "money transfered successfully!";


        }

    }


    $key = file_get_contents("key");
    $key = hex2bin($key);
    
    echo $key;

    //generate another token
    //generate xsrf token if the form is not submitted
    $uid  = uniqid();   //user id if possible
    $secure_random = base64_encode(openssl_random_pseudo_bytes(64)); // secure random 64 bytes
    $_SESSION['xsrf_token'] = hash_hmac('sha256',session_id().$uid.$secure_random,$key);

    
        

    


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
            <div class="col-5 offset-md-3" style='margin-top:100px'>

            <h1>Bank transfer | Transfer money to other accounts</h1>

                <form method="post" >
                <div class="form-group">
                        <label for="name">Account : <?php echo $_SESSION['name']; ?></label>
                    </div>
                    <div class="form-group">
                        <label for="message">To account</label>
                        <textarea type="text" class="form-control" name="to_account" placeholder="e.g. Victor  ..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">Amount</label>
                        <input type="text" class="form-control" name="amount" placeholder="1">
                    </div>
                    
                    <div class="form-group">
                        <label for="color">Invoice URL picture</label>
                        <input type="text" class="form-control" name="url" placeholder="url">
                    </div>
                    <input type='hidden' name='xsrf_token' value="<?php echo $_SESSION['xsrf_token'];?>" > 
                    <br/>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <div style='color:red;margin-top:20px;'>
                        <?php 
                            if(isset($error_msg))
                                echo $error_msg; 
                        ?>
                    </div>
            </div>
        </div>
     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>