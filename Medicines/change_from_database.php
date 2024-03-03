<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>change From Database</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>
    <body>
        <?php
            include_once('db_medicines.php');      //runs db_medicines.php
            if(isset($_GET['medi_id'])){           //isset checks if variable stores any value or not, got medi_id from medicines_admin.php
                $medi_ID = mysqli_real_escape_string($con, $_GET['medi_id']);     //storing id into medi_id
                
                $sql_fetch = "SELECT * FROM `1mgdata` where Medicine_ID ='$medi_ID'";
                
                $sql_query1 = mysqli_query($con, $sql_fetch);      //runs sql query with connection made with database
                $fetch_assoc = mysqli_fetch_assoc($sql_query1);    // fetches complete row
                $medi_Medicine_ID = $fetch_assoc['Medicine_ID'];   //fetches particular data from the row

                $sql_query2 = mysqli_query($con, $sql_fetch);
                $fetch_assoc = mysqli_fetch_assoc($sql_query2);
                $medi_Name = $fetch_assoc['Name'];
                
                $sql_query3 = mysqli_query($con, $sql_fetch);
                $fetch_assoc = mysqli_fetch_assoc($sql_query3);
                $medi_Packet = $fetch_assoc['Packet'];

                $sql_query4 = mysqli_query($con, $sql_fetch);
                $fetch_assoc = mysqli_fetch_assoc($sql_query4);
                $medi_No_of_rating = $fetch_assoc['No_of_rating'];

                $sql_query5 = mysqli_query($con, $sql_fetch);
                $fetch_assoc = mysqli_fetch_assoc($sql_query5);
                $medi_Rating = $fetch_assoc['Rating'];
                
                $sql_query6 = mysqli_query($con, $sql_fetch);
                $fetch_assoc = mysqli_fetch_assoc($sql_query6);
                $medi_Price = $fetch_assoc['Price'];
                
                $sql_query7 = mysqli_query($con, $sql_fetch);
                $fetch_assoc = mysqli_fetch_assoc($sql_query7);
                $medi_Available = $fetch_assoc['Available'];
                
                $_SESSION['medi_Medicine_ID'] = $medi_Medicine_ID; // created because update needs id
            }
            if(isset($_POST['Change'])){
                $Med_id = $_POST['Med_id'];
                $Med_Name = $_POST['Med_Name'];
                $Packect = $_POST['Packect'];
                $No_of_ratings = $_POST['No_of_ratings'];
                $Ratings = $_POST['Ratings'];
                $Price = $_POST['Price'];
                $Available = $_POST['Available'];

                $medi_ID_check = "SELECT * FROM `1mgdata` where Medicine_ID ='$Med_id'";
                $query = mysqli_query($con, $medi_ID_check);
        
                $IDcount = mysqli_num_rows($query);    //counts the no of rows which satisfies the condition

                if($IDcount>0){
                    $_SESSION['Id_already'] = '1';
                    header("location: medicines_admin.php");
                }
                else{
                    $update = "UPDATE `medicines`.`1mgdata` SET `Medicine_ID`='$Med_id',`Name`='$Med_Name',`Packet`='$Packect',`No_of_rating`='$No_of_ratings',`Rating`='$Ratings',`Price`='$Price',`Available`='$Available' WHERE Medicine_ID='" . $_SESSION['medi_Medicine_ID']."'";
                    if($con->query($update) == true){      // rquired to run query and check for error
                        $_SESSION['medi_change'] = '1';
                        header("location: medicines_admin.php");
                    }
                    else{
                        echo "Error: $sql <br> $con->error";
                    }
                }
            }
        
        ?>
        <form class="d-flex" action="change_from_database.php" method="post">
            <input type="number" name="Med_id" id="Med_id" placeholder="<?php echo $medi_Medicine_ID ?>" required>
            <input type="text" name="Med_Name" id="Med_Name" placeholder="<?php echo $medi_Name ?>" required>
            <input type="text" name="Packect" id="Packect" placeholder="<?php echo $medi_Packet ?>" required>
            <input type="text" name="No_of_ratings" id="No_of_ratings" placeholder="<?php echo $medi_No_of_rating ?>" required>
            <input type="text" name="Ratings" id="Ratings" placeholder="<?php echo $medi_Rating ?>" required>
            <input type="text" name="Price" id="Price" placeholder="<?php echo $medi_Price ?>" required>
            <input type="number" name="Available" id="Available" placeholder="<?php echo $medi_Available ?>" required>
            <button type="Submit" name="Change" id="Change" class="btn">Change</button>
        </form>
        <?php
            $con->close();
        ?>
    </body>
</html>