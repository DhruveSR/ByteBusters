<?php
    //made connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "signup";

    $con = mysqli_connect($server, $username, $password, $db);

    // check for connection
    if(!$con){
        die("Connection to this database failed due to" . mysqli_connect_error());
    }
?>