
<?php 


    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);

    $base_path = 'files/';

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


    
    $display_flag = false;

    echo "Option 1: ";
    //Option 1 : //Check if the real path start with base path or not. using substring
    if(realpath($base_path) == substr(realpath($path),0, strlen(realpath($base_path)) )){
        echo "Match !!". "\n";
        $display_flag = true;
    }else{
        echo "No match !". "\n";
    }


    echo "Option 2: ";
    //Option 2: Check if the real path start with base path or not using str_starts_with
    //only works in PHP 8, to run in PHP 7 comment the str_starts_with function down there.
    if(str_starts_with(realpath($path),realpath($base_path))){
        echo "Match !!". "\n";
        $display_flag = true;
    }else{
        echo "No match !". "\n";
    }

    //implementation of str_starts_with
    function str_starts_with($a, $b){
        return ($b == substr($a,0,strlen($b)));
    }

    echo "</pre>";

    //Load the image as base64 encoded
    $imageData = file_get_contents($path);
    $base64Image = base64_encode($imageData);
    $dataURLimage = "data:image/jpg;base64,".$base64Image;

?>

?>
<h1> Apple store </h1>
<img style='width:400px;height;300px;border-radius:5px;' src="<?php if($display_flag) echo $dataURLimage;?>" />
<p>Welcome to my apple store</p>
