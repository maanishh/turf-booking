<?php include('config/constants.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Turf Booking</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="../assets/system-logo.png">
</head>
<body>
    <div class="bg-login">
        <br><br>
        <div class="wrapper">
            <form method="POST">
                <h1>Forget Password</h1>
                <br>
                <center>
                <?php
                    if(isset($_SESSION['pass-not-same']))   //forget-password.php
                    {
                        echo $_SESSION['pass-not-same'];
                        unset($_SESSION['pass-not-same']);
                    }
                    if(isset($_SESSION['wrong-email']))     //forget-password.php
                    {
                        echo $_SESSION['wrong-email'];
                        unset($_SESSION['wrong-email']);
                    }
                ?>
                </center>
                <br>
                <div class="input-box">
                    <input type="text" name="username" placeholder="Enter Username" required>
                </div>
                <div class="input-box">
                    <input type="email" name="email" placeholder="Enter Email" required>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Enter New Password" required>
                </div>
                <div class="input-box">
                <input type="password" name="cpassword" placeholder="Retype Password" required>
                </div>

                <input type="submit" class="btn" value="Change Password" name="submit">
                <br><br>
                <div class="back">
                    <a href="<?php echo SITEURL; ?>">Back</a>
                </div>
            </form>
        </div>
        <br><br>
    </div>
</body>
</html>

<?php
    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);

        $sql = "SELECT * FROM registration WHERE username='$username'";
        $res = mysqli_query($conn, $sql);

        if($res==TRUE)
        {
            $count = mysqli_num_rows($res);
            if($count==1)
            {
                $rows = mysqli_fetch_assoc($res);
                
                $uemail = $rows['email'];

                if($email == $uemail)
                {
                    if($password == $cpassword)
                    {
                        $sql2 = "UPDATE registration SET password='$password' WHERE username='$username'";
                        $res2 = mysqli_query($conn, $sql2);

                        if($res2==TRUE)
                        {
                            $_SESSION['pass-same'] = "<div class='success'>Password Changed Successfully</div>";
                            ?>
                            <script>
                                window.location.href = "<?php echo SITEURL.'login-user.php' ?>"
                            </script>
                            <?php
                        }
                    }
                    else
                    {
                        $_SESSION['pass-not-same'] = "<div class='error'>Please Enter Same Password</div>";
                        ?>
                        <script>
                            window.location.href = "<?php echo SITEURL.'forget-password.php' ?>"
                        </script>
                        <?php
                    }
                }
                else
                {
                    $_SESSION['wrong-email'] = "<div class='error'>Please Enter Correct Email</div>";
                    ?>
                    <script>
                        window.location.href = "<?php echo SITEURL.'forget-password.php' ?>"
                    </script>
                    <?php
                }
            }
        }
    }
?>