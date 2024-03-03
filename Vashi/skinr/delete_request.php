<?php
    include_once('../../db_signup.php');
    $sql = "DELETE FROM fortis_skin_vashi_appointment WHERE SNo='" . $_GET["SNo_id"] . "'";
    if (mysqli_query($con, $sql)){
        header("Location: fortis_skin_vashi_admin.php");
    }
    else{
        echo "Error deleting record: " . mysqli_error($con);
    }
    mysqli_close($con);
?>