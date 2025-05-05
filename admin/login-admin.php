<?php include('../config/constants.php') ?>
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
        <div class="wrapper">
            <form method="POST">
                <h1>Login Admin</h1>
                <br>
                <center>
                <?php
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                    if(isset($_SESSION['no-login']))
                    {
                        echo $_SESSION['no-login'];
                        unset($_SESSION['no-login']);
                    }
                ?>
                </center>
                <br>
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username" required>
                    <img src="./assets/user.png">
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <img src="./assets/lock.png">
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Remember Me</label>
                    <a href="#">Forgot password?</a>
                </div>

                <input type="submit" class="btn" value="Login" name="submit">

                <div class="register-link">
                    <p>Don't have an account? <a href="#">Register</a></p>
                </div>
                <div class="back">
                    <a href="<?php echo SITEURL; ?>">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        

        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count==1)
        {
            $_SESSION['login'] = "<div class='success'>Login Successfully</div>";
            $_SESSION['admin'] = $username;  //checked user logged in or not
            header("location:".SITEURL.'admin/index.php');
        }
        else
        {
            $_SESSION['login'] = "<div class='error'>Username And Password Not Match</div>";
            header("location:".SITEURL.'admin/login-admin.php');
        }

    }
?>