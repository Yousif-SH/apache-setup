
<?php
// bypassing content type validation to upload any file type

//cat photo.png > ex2.php
//cat ex1.php >> ex2.php

if(isset($_POST['submit'])){
    //$uploaddir = '/var/www/sites/eh/example_file_upload';
    //$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

    echo '<pre>';
    if(mime_content_type($_FILES['userfile']['tmp_name']) == "image/png")
    {
        if (move_uploaded_file($_FILES['userfile']['tmp_name'], "uploaded_files/".$_FILES['userfile']['name']))
            echo "File is valid, and was successfully uploaded to upload_files/".$_FILES['userfile']['name']."\n";
    
    } else {
        echo "Invalid type, only images are acceptable !\n";
        echo "Possible file upload attack!\n";
    }

    echo 'Here is some more debugging info:';
    print_r($_FILES);

    print "</pre>";
}

?>


In linux, ensure that the uploaded directory have write access! you can set via chmod a+w directory_name
<!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data"  method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input name="userfile" type="file" />
    <input type="submit" value="Send File" name='submit' />
</form>

