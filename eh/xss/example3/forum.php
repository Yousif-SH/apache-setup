<?php

    // XSS, via URL
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    include "../db_connection.php";

    session_start();


    $db = db_connect();
    $query = $db->prepare("SELECT * FROM posts");
    $query->execute();
    $row_count = $query->rowCount();//Row count
   
    
        
    

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
            <div class="col-8 offset-md-2" style='margin-top:100px'>

                <h1>Forum | Messages</h1>

                


                    <?php 
                        if(isset($row_count)){
                            if($row_count > 0){
                                ?>
                                <table class="table table-bordered" >
                                        <thead>
                                            <tr>
                                            <!-- <th scope="col">#</th> -->
                                            <th scope="col">Name</th>
                                            <th scope="col">Message</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                <?php 
                                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                    ?>
                                            <tr>
                                            <!-- <th scope="row"><?php echo  $row['id']; ?></th> -->
                                            <td><?php echo  $row['name']; ?></td>

                                            <td> 
                                                    <a  href="<?php echo $row['url']; ?>" 
                                                        style="color:<?php echo $row['color']; ?>">  
                                                        <?php echo  $row['message']; ?>
                                                    </a>
                                            </td>
                                            </tr>
                                        
                                    <?php 
                                }
                                
                                ?> 
                                </tbody>
                                </table> 
                                <?php

                            }else{
                                echo "No messages!!";
                            }
                        }
                    ?>

                <br/><a href="add_post.php" >Add post </a>
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