<?php
include_once('db_medicines.php');
$sql = "DELETE FROM shopping_cart WHERE Medicine_ID='" . $_GET["medi_id"] . "'";
if (mysqli_query($con, $sql)) {
    header("Location: shopping_cart.php");
} else {
    echo "Error deleting record: " . mysqli_error($con);
}
mysqli_close($con);
?>
