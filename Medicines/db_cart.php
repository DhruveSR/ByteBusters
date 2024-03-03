<?php
    session_start();
    $inserted = false;
    
    include_once('db_medicines.php');
    
    if(isset($_GET['No'])){
        $No_of_pieces = mysqli_real_escape_string($con, $_GET['No']);

        $medi_ID = mysqli_real_escape_string($con, $_SESSION['medicine_id']);

        $sql_fetch = "SELECT * FROM `1mgdata` where Medicine_ID ='$medi_ID'";
        
        $sql_query1 = mysqli_query($con, $sql_fetch);
        $fetch_assoc = mysqli_fetch_assoc($sql_query1);
        $medi_No_of_rating = $fetch_assoc['No_of_rating'];
        //echo $medi_no_of_rating;
      
        $sql_query2 = mysqli_query($con, $sql_fetch);
        $fetch_assoc = mysqli_fetch_assoc($sql_query2);
        $medi_Rating = $fetch_assoc['Rating'];
        //echo $medi_Rating;
        
        $sql_query3 = mysqli_query($con, $sql_fetch);
        $fetch_assoc = mysqli_fetch_assoc($sql_query3);
        $medi_Price = $fetch_assoc['Price'];

        $sql_query4 = mysqli_query($con, $sql_fetch);
        $fetch_assoc = mysqli_fetch_assoc($sql_query4);
        $medi_Name = $fetch_assoc['Name'];

        $sql_query5 = mysqli_query($con, $sql_fetch);
        $fetch_assoc = mysqli_fetch_assoc($sql_query5);
        $medi_Packet = $fetch_assoc['Packet'];
        
        //var_dump($medi_Price);
        
        $sql_insert = "INSERT INTO `medicines`.`shopping_cart` (`Medicine_ID`, `Name`, `Packet`, `No_of_rating`, `Rating`, `Price`, `No_of_pieces`, `DT`) VALUES ('$medi_ID', '$medi_Name', '$medi_Packet', '$medi_No_of_rating', '$medi_Rating', '$medi_Price', '$No_of_pieces', current_timestamp());";
        
        if($con->query($sql_insert) == true){
            $inserted = true;
        }
        else{
            echo "Error: $sql_insert <br> $con->error";
        }
    }

    if($inserted == true){
      header("Location: medicines.php");
      exit();
    }
?>