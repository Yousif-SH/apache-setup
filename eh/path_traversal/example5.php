
<?php 


    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    //you can use open_basedir from php.ini to configure the server to only open files
    //from this directory
    $base_path = 'files/';
    ini_set('open_basedir', $base_path);


    $filename = 'apple.jpg';
    if(isset($_GET['filename'])){
        $filename = $_GET['filename'];
    }
    
    //create a path for the file
    $path = $base_path.$filename;

    echo "<pre>";
    echo "Base Path :".$base_path. "\n";
    echo "Request URL :".$filename. "\n";
    echo "Real Base Path :".realpath($base_path). "\n";
    echo "Real Request URL :".realpath($path). "\n";

    //Load the image as base64 encoded
    $imageData = file_get_contents($path);
    $base64Image = base64_encode($imageData);
    $dataURLimage = "data:image/jpg;base64,".$base64Image;

?>
<h1> Apple store </h1>
<img style='width:400px;height;300px;border-radius:5px;' src="<?php echo $dataURLimage;?>" />
<p>Welcome to my apple store</p>
