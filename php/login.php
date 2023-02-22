<?php

    require "C:\Users\Public\Github\Boom\htdocs\hw2\database\config.php";

    session_start();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // user loging
        $userid_login = $_POST['userid_login'];
        $password_login = $_POST['password_login'];

        // search db for user loging
        $sql = "SELECT * FROM users WHERE userid = '$userid_login' AND password = '$password_login'";
        $result = mysqli_query($con, $sql);

        $check = mysqli_fetch_array($result);


        function alert($msg){
            echo "<script type='text/javascript'> alert('" . $msg . "'); 
            window.location = 'C:\Users\Public\Github\Boom\htdocs\hw2\Registration.html';
            </script>";
        }
  

        if(isset($check)){
            alert("Loging successfully!");
        }else{
           alert("Please check your UserID and Password !"); 
        }
    }

    $con->close();
?>