<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="../../table.css" />
        <title>Admin - Fortis Skin Vashi</title>
        </head>
    <body>
        <?php
            include_once('../../db_signup.php');
            if(isset($_GET['SNo_id'])){
                $SNo_id = mysqli_real_escape_string($con, $_GET['SNo_id']);
                
                $sql_fetch = "SELECT * FROM `fortis_skin_vashi_appointment` where SNo ='$SNo_id'";

                $result = $con->query($sql_fetch);
                
                $sql_query1 = mysqli_query($con, $sql_fetch);
                $fetch_assoc = mysqli_fetch_assoc($sql_query1);
                $app_SNo = $fetch_assoc['SNo'];

                $sql_query2 = mysqli_query($con, $sql_fetch);
                $fetch_assoc = mysqli_fetch_assoc($sql_query2);
                $app_Name = $fetch_assoc['Name'];
                
                $sql_query3 = mysqli_query($con, $sql_fetch);
                $fetch_assoc = mysqli_fetch_assoc($sql_query3);
                $app_Email = $fetch_assoc['Email'];

                $sql_query4 = mysqli_query($con, $sql_fetch);
                $fetch_assoc = mysqli_fetch_assoc($sql_query4);
                $app_Phone = $fetch_assoc['Phone'];

                $sql_query5 = mysqli_query($con, $sql_fetch);
                $fetch_assoc = mysqli_fetch_assoc($sql_query5);
                $app_DT = $fetch_assoc['DT'];
                
                $sql_query6 = mysqli_query($con, $sql_fetch);
                $fetch_assoc = mysqli_fetch_assoc($sql_query6);
                $app_Comment = $fetch_assoc['Comment'];

                $_SESSION['Session_SNo'] = $app_SNo;
        ?>
                <table>
                    <tr>
                    <th> SNo </th>
                    <th> Name </th>
                    <th> Email </th>
                    <th> Phone </th>
                    <th> DateTime of Request </th>
                    <th> Comment </th>
                    </tr>
        <?php   
                    $i = 1;
                    while($row = mysqli_fetch_array($result)) {
        ?>  
                        <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $app_Name; ?></td>
                        <td><?php echo $app_Email; ?></td>
                        <td><?php echo $app_Phone; ?></td>
                        <td><?php echo $app_DT; ?></td>
                        <td><?php echo $app_Comment; ?></td>
                        </tr>
        <?php   
                        $i++;
        ?>
                </table>
        <?php
                }
            }
            if(isset($_POST['Chnage_comment'])){
                $change_comment = $_POST['Comment'];
            
                $update = "UPDATE `signup`.`fortis_skin_vashi_appointment` SET `Comment`='$change_comment' WHERE SNo='" . $_SESSION['Session_SNo']."'";
                if($con->query($update) == true){
                    $_SESSION['comment_change'] = '1'; 
                    header("location: fortis_skin_vashi_admin.php");
                }
                else{
                    echo "Error: $sql <br> $con->error";
                    echo "true";
                }
            }
        ?>
            <form name ="Change_fortis" class="d-flex" action="comment_request.php" method="post">
                <textarea type="text" name="Comment" id="Comment" placeholder="" required></textarea>
                <button type="Submit" name="Chnage_comment" id="Chnage_comment" class="btn">Comment</button>
            </form>
        <?php
            $con->close();
        ?>
    </body>
</html>