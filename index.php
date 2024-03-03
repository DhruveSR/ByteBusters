<?php
  $logged_in = true;
  session_start();

    if(!isset($_SESSION['Username'])){
        $logged_in = false;
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> PreDO </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="indexstyle.css?<?php echo time(); ?>" />
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-secondary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="images/logo.jpeg" alt="" width="100" height="100">
                </a>
                <span class="navbar-text" href="#" style="color:coral;">
                    <h1> PreDO &nbsp;&nbsp;</h1>
                </span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <h2><a class="nav-link active" aria-current="page" href="Registration/Signup.php" style="color:white;">
                            <?php
                                echo $_SESSION['Username'] ?? "Sign up"
                            ?></a></h2>
                        </li>
                        <li class="nav-item">
                            <h2><a class="nav-link" href="aboutus.php" style="color:white ;">&nbsp;&nbsp;About us&nbsp;&nbsp;</a></h2>
                        </li>
                        <?php
                            if($logged_in == true){
                        ?>
                                <li class="nav-item">
                                    <h2><a class="nav-link" href="Registration/logout.php" style="color:white ;">Log out</a></h2>
                                </li>
                        <?php
                            }
                        ?>
                        <li class="nav-item">
                            <h2><a class="nav-link" href="bot.php" style="color:white ;">Chat-Bot</a></h2>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
        <section class="home" id="home">
            <div class="image">
                <img src="images/home.svg" alt="">
            </div>
            <div class="content">
                <h3>"Fall in love with taking care of yourself."</h3>
            </div>
        </section>
        <section class="services" id="services">
            <h1 class="heading"> our <span>services</span> </h1>
            <div class="box-container">
                <div class="box">
                    <i class="fas fa-notes-medical"></i>
                    <h3>DISEASE PREDICTION</h3>
                    <p> FIND OUT WHICH DISEASE YOU HAVE</p>
                    <a href="Disease prediction/predict.php" class="btn"> Find out <span class="fas fa-chevron-right"></span> </a>
                </div>
                <div class="box">
                    <i class="fas fa-user-md"></i>
                    <h3> 24/7 HOSPITALS</h3>
                    <p> GETTING AN APPOINTMENT IS JUST ONE STEP AWAY.</p>
                    <div class="dropdown">
                        <button class="dropbtn">LOCATION</button>
                        <div class="dropdown-content">
                            <a href="Vashi/vashi.php">Vashi</a>
                            <a href="Kurla/kurla.php">Kurla</a>
                            <a href="Thane/thane.php">Thane</a>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <i class="fas fa-notes-medical"></i>
                    <h3>MEDICINE</h3>
                    <p> ORDER MEDICINES WITH A TAP OF A BUTTON</p>
                    <a href="Medicines/medicines.php" class="btn"> Order Now <span class="fas fa-chevron-right"></span> </a>
                    <h5><a href="Medicines/medicines_admin.php"class="nav-link"> Admin</a></h5>
                </div>
            </div>
        </section>
        <div>
            
        </div>
</body>
</html>