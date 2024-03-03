<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="Signupstyle.css">
</head>
<body>
    <?php
        session_start();
        $submitted = false;
        if(isset($_POST['Submit'])){
            include_once('../db_signup.php');
            $Email = $_POST['Email'];
            $Pword = $_POST['Password'];

            $email_search = "SELECT * FROM `registration` where Email='$Email'";
            $query = mysqli_query($con, $email_search);

            $emailcount = mysqli_num_rows($query);
            if($emailcount){
                $email_pass = mysqli_fetch_assoc($query);
                $db_pass = $email_pass['Password'];
                $pass_decode = password_verify($Pword, $db_pass);
            
                if($pass_decode){
                    $_SESSION['Username'] = $Email;
                    header("Location: ../index.php");
                    exit();
                }
                else{
                    ?>
                    <script>
                        alert("incorrect password");
                    </script>
                <?php
                }
            }
            else{
                ?>
                    <script>
                        alert("Email not found");
                    </script>
                <?php
            }
            $con->close();
        }
    ?>
    <div class="container">
        <h1>LOGIN</h1>
        <form action="login.php" method="post">
            <input type="email" name="Email" id="Email" placeholder="Enter your email ID" required>
            <input type="password" name="Password" id="Password" placeholder="Enter the password" required>
            <button type="Submit" name="Submit" class="btn">Login</button>
            <p class="Text-centre">Don't have an account?<a href="Signup.php"> Sign up</a></p>
        </form>
    </div>
</body>
</html>