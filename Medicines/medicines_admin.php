<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="../table.css?<?php echo time(); ?>" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-secondary">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">
                    <img src="../images/logo.jpg" alt="" width="100" height="100">
                </a>
                <span class="navbar-text" href="#" style="color:white;">
                    <h1></h1>
                </span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    </ul>
                    <form class="d-flex" action="medicines_admin.php" method="post">
                        <input type="textbox" name="str" id="str" placeholder="Enter medicine name" required>
                        <button type="Submit" name="Search" class="btn">Search</button>
                    </form>
                    <div class="my-3">
                    </div>
                </div>
            </div>
        </nav>
        <?php
            include_once('db_medicines.php');
            $db_email = $_SESSION['Username'];
            if($db_email == 'Admin@gmail.com'){
                if(isset($_POST['Search'])){
                    $str = mysqli_real_escape_string($con, $_POST['str']);
                    $sql = "SELECT * FROM `1mgdata` WHERE Name like '%$str%'";
                    $res = mysqli_query($con, $sql);
                    if(mysqli_num_rows($res)==0){
                      echo "No medicines found";
                    }
                    else{
                        ?>
                        <table>
                            <tr>
                                <th>Medicine_ID</th>
                                <th>Name</th>
                                <th>Packet</th>
                                <th>No of reviews</th>
                                <th>Rating</th>
                                <th>Price</th>
                                <th>Available</th>
                                <th></th>
                                <th></th>
                            </tr>
                            <?php
                            $i = 0;
                            while($row = mysqli_fetch_assoc($res)){
                                ?>
                                <tr class="<?php if(isset($classname)) echo $classname;?>">
                                    <td><?php echo $row["Medicine_ID"]; ?></td>
                                    <td><?php echo $row["Name"]; ?></td>
                                    <td><?php echo $row["Packet"]; ?></td>
                                    <td><?php echo $row["No_of_rating"]; ?></td>
                                    <td><?php echo $row["Rating"]; ?></td>
                                    <td><?php echo $row["Price"]; ?></td>
                                    <td><?php echo $row["Available"]; ?></td>
                                    <td><a href="delete_from_database.php?medi_id=<?php echo $row["Medicine_ID"]; ?>">Delete</a></td>
                                    <td><a href="change_from_database.php?medi_id=<?php echo $row["Medicine_ID"]; ?>">Change</a></td>
                                </tr>
                                <?php
                                $i++;
                            }
                        ?>
                        </table>
                        <?php
                    }
                }
                else{
                    if(isset($_SESSION['Id_already'])){
                        ?>
                        <script>
                            alert("Medicine id already exists in the database");
                        </script>
                        <?php
                        unset($_SESSION['Id_already']);
                    }
                    if(isset($_SESSION['medi_change'])){
                        ?>
                        <script>
                            alert("Changes made in the database");
                            </script>
                        <?php
                        unset($_SESSION['medi_change']);
                    }
                    if(isset($_SESSION['deleted_from_database'])){
                        ?>
                        <script>
                            alert("Deleted from the database");
                            </script>
                        <?php
                    }
                }
                ?>
                <form class="d-flex" action="medicines_admin.php" method="post">
                    <button type="Submit" name="Srch" id="Srch" class="btn">Add more medicines?</button>
                </form>
                <?php
                if(isset($_POST['Srch'])){
                    ?>
                    <form class="d-flex" action="medicines_admin.php" method="post">
                        <input type="number" name="Med_id" id="Med_id" placeholder="Enter medicine id" required>
                        <input type="text" name="Med_Name" id="Med_Name" placeholder="Enter medicine name" required>
                        <input type="text" name="Packect" id="Packect" placeholder="Enter packect desc" required>
                        <input type="text" name="No_of_ratings" id="No_of_ratings" placeholder="Enter the no of ratings" required>
                        <input type="text" name="Ratings" id="Ratings" placeholder="Enter the ratings" required>
                        <input type="text" name="Price" id="Price" placeholder="Enter the price" required>
                        <input type="number" name="Available" id="Available" placeholder="Enter the no of packets available" required>
                        <button type="Submit" name="Add" id="Add" class="btn">Add</button>
                    </form>
                    <?php
                }
                if(isset($_POST['Add'])){

                    $searching = true;

                    $Med_id = $_POST['Med_id'];
                    $Med_Name = $_POST['Med_Name'];
                    $Packect = $_POST['Packect'];
                    $No_of_ratings = $_POST['No_of_ratings'];
                    $Ratings = $_POST['Ratings'];
                    $Price = $_POST['Price'];
                    $Available = $_POST['Available'];

                    $IDquery = "SELECT * FROM `1mgdata` where Medicine_ID='$Med_id'";
                    $query = mysqli_query($con, $IDquery);
                    $IDcount = mysqli_num_rows($query);
                    if($IDcount>0){
                        ?>
                            <script>
                                alert("Medicine with same id already exists");
                            </script>
                        <?php
                    }
                    else{
                        $Med_insert = "INSERT INTO `medicines`.`1mgdata` (`Medicine_ID`, `Name`, `Packet`, `No_of_rating`, `Rating`, `Price`, `Available`) VALUES ('$Med_id', '$Med_Name', '$Packect', '$No_of_ratings', '$Ratings', '$Price', '$Available');";

                        if($con->query($Med_insert) == true){
                            ?>
                            <script>
                                alert("Medicine added to database");
                            </script>
                        <?php
                        }
                        else{
                            echo "Error: $sql <br> $con->error";
                        }
                    }
                }
            }
            else{
                header("Location: ../Registration/login.php");
            }
            $con->close();
        ?>
    </body>
</html>