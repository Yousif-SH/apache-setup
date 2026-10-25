
<?php 

    //bypass base64 encoding

    //try secret.txt
    //try this : ../../../../../../../../etc/passwd 

    //read files outside of www directory will not work via html tags giving their paths.
    // You need attack file_get_content to do so.
    

    $filename = 'apple.jpg';
    if(isset($_GET['filename'])){
        $filename = $_GET['filename'];
    }
    
    //create a path for the file
    $path = 'files/'.$filename;

    //read data of the file
    $imageData = file_get_contents($path);
    
    //convert it to base64 encoding
    $base64Image = base64_encode($imageData);

    //create data URL image
    $dataURLimage = "data:image/jpg;base64,".$base64Image;

?>
<h1> Apple store </h1>
<img style='width:400px;height;300px;border-radius:5px;' src="<?php echo $dataURLimage;?>" />
<p>Welcome to my apple store</p>
