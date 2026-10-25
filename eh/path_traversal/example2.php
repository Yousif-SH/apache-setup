
<?php 

    //bypass extension checks

    //try secret.txt?q=.jpg

    //read the readme.md file 
    //http://localhost/www/sites/eh/path_traversal/example2.php?filename=../README.md?q=.jpg
    

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);


    $filename = 'apple.jpg';
    if(isset($_GET['filename'])){
        $filename = $_GET['filename'];
    }

    
    //check the file extension end with .jpg
    $ext = explode('.',$filename);  // apple.jpg -> ext[0] = apple , ext[1] = jpg
    if( $ext[count($ext)-1] != 'jpg'){
        //clear the file name to avoid displaying files that is not end with .jpg
        $filename = "";
    }

    //create a path for the file
    $imagePath = 'files/'.$filename;
    

?>
<h1> Apple store </h1>
<img style='width:400px;height;300px;border-radius:5px;' src="<?php echo $imagePath;?>" />
<p>Welcome to my apple store</p>
