<?php

    //stored XSS
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

        $time_diff = (microtime(true) - $_SESSION['xsrf_time']);
        if($time_diff > 5*60){  //5 mins
            $status = false;
            $error_msg = "Time exceed, try again !";
        }

        

        //check all validation and default to deny
        if($status){

            $name = $_POST['name'];
            $message = $_POST['message'];
            $color = $_POST['color'];
            $url = $_POST['url'];

            $db = db_connect();
            $query = $db->prepare('INSERT INTO `posts` (`name`, `message`, `color`,`url`) VALUES (?,?,?,?)');
            //$query->execute([$name,$message,$color,$url]);
            $error_msg = "message inserted successfully!";


        }

    }

    //generate another token
    //generate xsrf token if the form is not submitted
    $_SESSION['xsrf_time']  = microtime(true);
    $_SESSION['xsrf_id']  = uniqid();   //user id if possibile
    $_SESSION['xsrf_nonce'] = base64_encode(random_bytes(32)); // random number rand() or random 32 byte
    $_SESSION['xsrf_token'] = hash('sha256',$_SESSION['xsrf_time'].$_SESSION['xsrf_id'].$_SESSION['xsrf_nonce']);

    
        

    


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

                <h1>Item | Add new message</h1>

                <form method="post" >
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea type="text" class="form-control" name="message" placeholder="message ..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="color">Color</label>
                        <select type="text" class="form-control" name="color" placeholder="color">
                            <option value='black'>black</option>
                            <option value='red'>red</option>
                            <option value='green'>green</option>
                            <option value='blue'>blue</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="color">URL</label>
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