<?php

    //stored XSS
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    include "../db_connection.php";

    if(isset($_POST['submit'])){

        
        $name = $_POST['name'];
        $message = $_POST['message'];
        $color = $_POST['color'];
        $url = $_POST['url'];

        
        $status = true;
        $error_msg = "";


        //check all validation and default to deny
        if($status){

            $db = db_connect();
            $query = $db->prepare('INSERT INTO posts (name, message, color,url) VALUES (?,?,?,?)');
            $query->execute([$name,$message,$color,$url]);
            $error_msg = "message inserted successfully!";
            header('Location:forum.php');


        }
        

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