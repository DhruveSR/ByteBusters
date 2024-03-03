<?php
    session_start();
    if(isset($_SESSION['Username'])){

        include_once('../../db_signup.php');
    
        $db_email = $_SESSION['Username'];
        $email_search = "SELECT * FROM `registration` where Email='$db_email'";

        $email_query1 = mysqli_query($con, $email_search);
        $email_name = mysqli_fetch_assoc($email_query1);
        $db_name = $email_name['Name'];

        $email_query2 = mysqli_query($con, $email_search);
        $email_phone = mysqli_fetch_assoc($email_query2);
        $db_phone = $email_phone['Phone'];
        $sql2 = "INSERT INTO `signup`.`fortis_skin_vashi_appointment` (`Name`, `Email`, `Phone`, `DT`) VALUES ('$db_name', '$db_email', '$db_phone', current_timestamp());";
        
        if($con->query($sql2) == true){
            $_SESSION['app'] = 1;
            header("Location: skinr.php");
            exit();
        }
        else{
            echo "ERROR: $sql2 <br> $con->error";
        }

        $con->close();
    }
    else{
        header("Location: ../../Registration/Signup.php");
    }
?>