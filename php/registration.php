<?php

require "C:\Users\Public\Github\Boom\htdocs\hw2\database\config.php";
session_start();

    // validate inputs
    $userid_reg = $_POST['userid_reg'];
    $password_reg = $_POST['password_reg'];
    


    $sql1 = "INSERT INTO  users (userid, password)
            VALUES ('$userid_reg', '$password_reg')";

    $sq2 = "SELECT * FROM users WHERE userid = '$userid_reg'";

    $result = mysqli_query($con, $sq2);

    $check = mysqli_fetch_array($result);
    
    function alert($msg){
        echo "<script type='text/javascript'> alert('" . $msg . "'); 
        window.location = 'hw2/Registration.html';
        </script>";
    }

    if(isset($check)){
        alert("UserID already tacken!");
    }else{
        if($con->query($sql1)===TRUE){
            alert("Success!");
        }else{
            alert("Failed!");
        }
    }
    $con->close();
?>