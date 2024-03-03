<?php
    session_start();
    include_once('db_medicines.php');
    $sql = "DELETE FROM 1mgdata WHERE Medicine_ID='" . $_GET["medi_id"] . "'";
    if (mysqli_query($con, $sql)) {
        $_SESSION['deleted_from_database'] = '1';
        header("Location: medicines_admin.php");
    }
    else {
        echo "Error deleting record: " . mysqli_error($con);
    }
    mysqli_close($con);
?>