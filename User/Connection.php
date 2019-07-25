<?php

    //Make connection
    
    $host_name = "localhost";
    $username = "root";
    $password = "";
    $database_name = "onlinechat";
    
    $db_conn = mysqli_connect($host_name,$username,$password,$database_name) or die("Connection error!");
?>