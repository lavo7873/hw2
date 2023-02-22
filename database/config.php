<?php

    $host = "localhost";
    $user = "root";
    $dbpassword = "";
    $dbname = "hw2";

    $con = new mysqli($host, $user, $dbpassword, $dbname);

    //check connection
    if(!$con){
        die("Connection Failed: " . mysqli_error());
    }
?>