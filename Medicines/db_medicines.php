<?php
    //made connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "medicines";

    $con = mysqli_connect($server, $username, $password, $db);   //connection made

    // check for connection
    if(!$con){
        die("Connection to this database failed due to" . mysqli_connect_error());  //die() exits after echoing
    }
?>