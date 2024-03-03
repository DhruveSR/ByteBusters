<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin - Fortis Skin Vashi</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" type="text/css" href=" fortis_styles.css">
    </head>
    <body>
        <?php
            include_once('../../db_signup.php');
            $db_email = $_SESSION['Username'];
            if($db_email == 'Admin@gmail.com'){

                $sql = "SELECT * FROM fortis_skin_vashi_appointment";

                $result = $con->query($sql);

        ?>
                <table>
                	<tr>
                	<th> SNo </th>
                	<th> Name </th>
                	<th> Email </th>
                	<th> Phone </th>
                	<th> DateTime of Request </th>
                    <th> Comment </th>
                	<th> </th>
                    <th> </th>
                	</tr>
        <?php
                    $i = 1;
                    while($row = mysqli_fetch_array($result)) {
        ?>
                        <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row["Name"]; ?></td>
                        <td><?php echo $row["Email"]; ?></td>
                        <td><?php echo $row["Phone"]; ?></td>
                        <td><?php echo $row["DT"]; ?></td>
                        <td><?php echo $row["Comment"]; ?></td>
                        <td><a href="comment_request.php?SNo_id=<?php echo $row["SNo"]; ?>">Comment</a></td>
                        <td><a href="delete_request.php?SNo_id=<?php echo $row["SNo"]; ?>">Delete</a></td>
                        </tr>
        <?php
                        $i++;
                }
                    $con->close();
            }
            else{
                header("Location: ../../Registration/login.php");
            }
        ?>
            </table>
    </body>
</html>