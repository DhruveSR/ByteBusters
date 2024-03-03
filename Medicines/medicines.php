<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Medicines</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="style.css">
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
                    <form class="d-flex" action="medicines.php" method="post">
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
            if(isset($_POST['Search'])){
                $str = mysqli_real_escape_string($con, $_POST['str']);
                $sql = "SELECT * FROM `1mgdata` WHERE Name like '%$str%'";
                $res = mysqli_query($con, $sql);
                if(mysqli_num_rows($res)==0){
                  echo "No medicines found";
                }
                else{
                    while($row = mysqli_fetch_assoc($res)){
        ?>
                        <section class="services" id="services">
                            <h1 class="heading"></h1>
                            <div class="box-container">
                                <div class="box">
                                    <i class="fas fa-user-md"></i>
                                    <h3><?php echo "<a href='medi_info.php?ID=".$row['Medicine_ID']."'>".$row['Name']."</a>"; ?></h3>
                                    <p><?php echo $row['Packet'] ?></p>
                                </div>
                            </div>
                        </section>
        <?php
                    }
                }
            }
            $con->close();
        ?>
        <!-- <h1><a href="shopping_cart.php">Cart</a><h1> -->
        <a href="shopping_cart.php" class="btn"> CART<span class="fas fa-chevron-right"></span> </a>
        <!-- icons section starts  -->
        <section class="icons-container">
            <div class="icons">
                <img src="../images/syrup.jpg" alt="" width="200" height="200">
                <h4>Easy availability</h4>
            </div>
            <div class="icons">
                <img src="../images/homedel.jpg" alt="" width="200" height="200">
                <h4>delivery at your doorstep</h4>
            </div>
            <div class="icons">
                <img src="../images/247.jpg" alt="" width="200" height="200">
                <h4>24/7 service available</h4>
            </div>
            <div class="icons">
                <img src="../images/rel.jpg" alt="" width="200" height="200">
                <h4>reliable</h4>
            </div>
        </section>
    </body>
</html>