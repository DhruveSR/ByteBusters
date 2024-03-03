<?php
    session_start();
    $submitted = false;
    if(isset($_POST['Submit'])){
        include_once('../db_signup.php');
        if(!$con){
            die("Connection to this database failed due to" . mysqli_connect_error());
        }
        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $Phone = $_POST['Phone'];
        $Pword = $_POST['Password'];
        $CPword = $_POST['CPassword'];

        $Pass = password_hash($Pword, PASSWORD_BCRYPT); //encrypts passwords
        $CPass = password_hash($CPword, PASSWORD_BCRYPT);

        $emailquery = "SELECT * FROM `registration` where Email='$Email'";
        $query = mysqli_query($con, $emailquery);

        $emailcount = mysqli_num_rows($query);
        if(!preg_match("/^[a-zA-Z\s]+$/",$Name)){     //checks for name format
            ?>
                <script>
                    alert("Invalid name");
                </script>
            <?php
        }
        else{
            $domain = substr($Email, strpos($Email, '@') + 1);     //checks for email validity
            if  (checkdnsrr($domain) == FALSE){
                ?>
                <script>
                    alert("Email does not exist.");
                </script>
                <?php
            }
            else{
                if($emailcount>0){
                    ?>
                        <script>
                            alert("Email already exists");
                        </script>
                    <?php
                }
                else{
                    if($Pword === $CPword){

                        $sql = "INSERT INTO `signup`.`registration` (`Name`, `Email`, `Phone`, `Password`, `CPassword`, `DT`) VALUES ('$Name', '$Email', '$Phone', '$Pass', '$CPass', current_timestamp());";

                        if($con->query($sql) == true){
                            $submitted = true;
                        }
                        else{
                            echo "Error: $sql <br> $con->error";
                        }
                    }
                    else{
                        ?>
                        <script>
                            alert("Password are not matching");
                        </script>
                        <?php
                    }
                }
            }
        }
        $con->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HSign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="Signupstyle.css?<?php echo time(); ?>" />
</head>
<body>
    <div class="container">
        <h1>SIGN UP</h1>
        <?php
            if($submitted == true){
                $_SESSION['Username'] = $Email;
                header("Location: ../index.php");
                exit();
            }
        ?>
        <form action="Signup.php" method="post">
            <input type="text" name="Name" id="Name" placeholder="Enter your name" required>
            <input type="email" name="Email" id="Email" placeholder="Enter your email ID" required>
            <input type="phone" name="Phone" id="Phone" placeholder="Enter your phone number" required>
            <input type="password" name="Password" id="Password" placeholder="Enter a password" required>
            <input type="password" name="CPassword" id="CPassword" placeholder="Re-enter the password" required>
            <button type="Submit" name="Submit" class="btn">Create an Account</button>
            <p class="Text-centre">Already have an account?<a href="login.php"> Login</a></p>
        </form>
    </div>
</body>
</html>