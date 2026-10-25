<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);


    //to run this page, simply pass in the url data as GET.
    //try this url 
    // http://localhost/www/sites/eh/xss/example5/example.php?data=<script>alert(1)</script>

    if(isset($_GET['data'])){

        $data = $_GET['data'];

        //this will print data without santisaztion
        echo $data;
        echo "<br/>";

        //These are escaping methods. can be used to convert special characters like (<, >) into HTML entities.        echo htmlentites($data);
        echo htmlentities($data);
        echo "<br/>";
        
        echo htmlspecialchars($data);
        echo "<br/>";

        //You can see the output using view-source:

        //For validation. Assume, data can only have 3 values, you can use `in` to test that.
        $whitelist_data = ['red','blue','green'];
        if(in_array($data,$whitelist_data)){
            echo "Valid color :".$data;
            //this will return true, if the data in the is within the whitelisted data.
        }else{
            echo "Invalid color"; // remember to not print it as it will execute XSS, if it has one.
        }


        //Othewrirse you can use regular expression to check if the input contains special characrters. 
        



    }





?>