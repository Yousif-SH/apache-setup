
<?php
// bypassing content type validation to upload any file type


if(isset($_POST['submit'])){
    //$uploaddir = '/var/www/sites/eh/example_file_upload';
    //$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

    print "<pre>";
    //Change extension type
    $filename = explode(".", $_FILES['userfile']['name']);
    $filename  = $filename[0]. $_POST['FILE_EXT'];


    if (move_uploaded_file($_FILES['userfile']['tmp_name'], "uploaded_files/".$filename)) {
        echo "File is valid, and was successfully uploaded to uploaded_files/".$filename."\n";
    } else {
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
    <!-- MAX_FILE_SIZE must precede the file input field (200 bytes)-->
    <input type="hidden" name="MAX_FILE_SIZE" value="200" />
    <input type="hidden" name="FILE_EXT" value=".png" />
    <!-- Name of input element determines name in $_FILES array -->
    Send this file: <input name="userfile" type="file" />
    <input type="submit" value="Send File" name='submit' />
</form>

