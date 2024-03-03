<?php
    session_start();
    if(isset($_SESSION['app'])){
?>
    <script>
        alert("Request  for an appointment is send. Please wait for further contact.");
    </script>
<?php
    unset($_SESSION['app']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skin - Vashi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="style.css?<?php echo time(); ?>" />
</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
      
<section class="blogs" id="blogs">

<h1 class="heading"> HOSPITALS </span> </h1>

<div class="box-container">

    <div class="box">
        <div class="image">
            <img src="../../images/fortis_hiranandani_hospital_vashi-min.jpeg" alt="">
        </div>
        <div class="content">
            <h3>FORTIS HOSPITAL</h3>
            <p>
                Hospitals in Vashi,NaviMUmbai <br>Address: 10, Plot No, 28, Juhu Chowpatty Marg, Juhu Nagar, Sector 10, Vashi, Navi Mumbai, Maharashtra 400709
                 
                 <br> Providers Phone: 022 6285 7001</p>
                       <br>
                 <br>
                 <br>
                 <br>
                 <br>
            <a href="fortis_vashi_appointment.php" class="btn"> book now <span class="fas fa-chevron-right"></span> </a>
            <h5><a href="fortis_skin_vashi_admin.php"class="nav-link"> Admin</a></h5>
        </div>
    </div>

    <div class="box">
        <div class="image">
            <img src="../../images/new-navjeevan-hospital.jpeg" alt="">
        </div>
        <div class="content">
           
            <h3>Navjeevan Hospital</h3>
            <p>

Hospital in Navi Mumbai, Maharashtra
Address:D-3, Premnath Maruti Patil Marg, Liberty Housing Society, Sector 1, Vashi, Navi Mumbai, Maharashtra 400703<br>
Providers: 022 2789 1801
<br>   </br>

<br>   </br>


</p>
            <a href="#" class="btn"> book now <span class="fas fa-chevron-right"></span> </a>
            <h5><a href="#"class="nav-link"> Admin</a></h5>
        </div>
    </div>

    <div class="box">
        <div class="image">
            <img src="../../images/mgm.jpeg" alt="">
        </div>
        <div class="content">
            
            <h3>            MGM Hospital
</h3>
            <p>


General hospital in Navi Mumbai, Maharashtra<br>

Address: Plot No.35, Atmashanti Society, Sector 3, Vashi, Navi Mumbai, Maharashtra 400703
Areas served: Sector 3
Hours: 
Open 24 hours
Phone: 022 5066 6777


<br>   </br>
<br>
</p>
            <a href="#" class="btn"> book now <span class="fas fa-chevron-right"></span> </a>
            <h5><a href="#"class="nav-link"> Admin</a></h5>
        </div>
    </div>

</div>

</section>
      
</body>
</html>