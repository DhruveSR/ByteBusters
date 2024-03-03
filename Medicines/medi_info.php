<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Medicine Information</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="../table.css?<?php echo time(); ?>" />
    </head>
    <body>
        <div>
            <?php
                include_once('db_medicines.php');
                if(isset($_GET['ID'])){
                    $medi_ID = mysqli_real_escape_string($con, $_GET['ID']);
                    
                    $sql_fetch = "SELECT * FROM `1mgdata` where Medicine_ID ='$medi_ID'";
                    
                    $sql_query1 = mysqli_query($con, $sql_fetch);
                    $fetch_assoc = mysqli_fetch_assoc($sql_query1);
                    $medi_No_of_rating = $fetch_assoc['No_of_rating'];

                    $sql_query2 = mysqli_query($con, $sql_fetch);
                    $fetch_assoc = mysqli_fetch_assoc($sql_query2);
                    $medi_Rating = $fetch_assoc['Rating'];
                    
                    $sql_query3 = mysqli_query($con, $sql_fetch);
                    $fetch_assoc = mysqli_fetch_assoc($sql_query3);
                    $medi_Price = $fetch_assoc['Price'];
                    
                    $sql_query4 = mysqli_query($con, $sql_fetch);
                    $fetch_assoc = mysqli_fetch_assoc($sql_query4);
                    $medi_Name = $fetch_assoc['Name'];
                    
                    $sql_query5 = mysqli_query($con, $sql_fetch);
                    $fetch_assoc = mysqli_fetch_assoc($sql_query5);
                    $medi_Packet = $fetch_assoc['Packet'];

                    $_SESSION['medicine_id'] = $medi_ID;
            ?>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Packet</th>
                            <th>No of reviews</th>
                            <th>Rating</th>
                            <th>Price</th>
                            <th>Available</th>
                        </tr>
                        <tr>
                            <td><?php echo $medi_Name; ?></td>
                            <td><?php echo $medi_Packet; ?></td>
                            <td><?php echo $medi_No_of_rating; ?></td>
                            <td><?php echo $medi_Rating; ?></td>
                            <td><?php echo $medi_Price; ?></td>
                            <td>
                                <form class="d-flex" action="medi_info.php" method="post">
                                    <input type="Number" name="No" id="No" placeholder=" How many pieces? " required>
                                    <button type="Submit" name="Enter" id="Enter" class="btn">Enter</button>
                                </form>
                                </td>
                            </tr>
                        </table>
                                <?php
                }
                else{
                    if(isset($_SESSION['medicine_id'])){
                        if(isset($_POST['Enter'])){
                            $No_of_pieces = $_POST['No'];

                            $medi_ID = mysqli_real_escape_string($con, $_SESSION['medicine_id']);

                            $sql_fetch = "SELECT * FROM `1mgdata` where Medicine_ID ='$medi_ID'";
                        
                            $sql_query1 = mysqli_query($con, $sql_fetch);
                            $fetch_assoc = mysqli_fetch_assoc($sql_query1);
                            $medi_No_of_rating = $fetch_assoc['No_of_rating'];

                            $sql_query2 = mysqli_query($con, $sql_fetch);
                            $fetch_assoc = mysqli_fetch_assoc($sql_query2);
                            $medi_Rating = $fetch_assoc['Rating'];

                            $sql_query3 = mysqli_query($con, $sql_fetch);
                            $fetch_assoc = mysqli_fetch_assoc($sql_query3);
                            $medi_Price = $fetch_assoc['Price'];

                            $sql_query4 = mysqli_query($con, $sql_fetch);
                            $fetch_assoc = mysqli_fetch_assoc($sql_query4);
                            $medi_Name = $fetch_assoc['Name'];

                            $sql_query5 = mysqli_query($con, $sql_fetch);
                            $fetch_assoc = mysqli_fetch_assoc($sql_query5);
                            $medi_Packet = $fetch_assoc['Packet'];

                            $_SESSION['medicine_id'] = $medi_ID;
            ?>
                            <table>
                                <tr>
                                    <th>Name</th>
                                    <th>Packet</th>
                                    <th>No of reviews</th>
                                    <th>Rating</th>
                                    <th>Price</th>
                                    <th>No of pieces</th>
                                </tr>
                                <tr>
                                    <td><?php echo $medi_Name; ?></td>
                                    <td><?php echo $medi_Packet; ?></td>
                                    <td><?php echo $medi_No_of_rating; ?></td>
                                    <td><?php echo $medi_Rating; ?></td>
                                    <td><?php echo $medi_Price; ?></td>
                                    <td><?php echo $No_of_pieces; ?></td>
                                </tr>
                            </table>
            <?php
                            echo "<a href='db_cart.php?No=".$No_of_pieces."'>"."Add to Cart"."</a>";
                        }
                    }
                }
            ?>
        </div>
    </body>
</html>