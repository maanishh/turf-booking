<?php
    include('config/constants.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Turf Booking</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./assets/system-logo.png">
    <script src="./js/script.js"></script>
</head>

<body>
    <div class="container">
        <div class="bg-image">
        <?php
            if(!isset($_SESSION['user']))
            {
                ?>
                    <nav class="nav">
                        <div class="nav-item">
                            <a href="./index.html"><img src="./assets/system-logo.png" alt="Logo" class="logo"></a>
                        </div>
                        <div class="nav-item">
                            <div class="nav-sub-item"><a href="index.php">HOME</a></div>
                            <div class="nav-sub-item"><a href="ground.php">GROUND</a></div>
                            <div class="nav-sub-item"><a href="about.php">ABOUT US</a></div>
                            <div class="nav-sub-item">
                                <div class="dropdown">
                                    <button onclick="myFunction()" class="dropbtn">ACCOUNT</button>
                                    <div id="myDropdown" class="dropdown-content">
                                        <a href="./registration.php"><img src="./assets/registration.png" alt="registration">REGISTRATION</a>
                                        <a href="./login-user.php"><img src="./assets/login.png" alt="login">LOGIN</a>
                                        <a href="./admin/login-admin.php"><img src="./assets/admin.png" alt="admin">ADMIN</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                <?php
            }
            else
            {
                ?>
                    <nav class="nav">
                        <div class="nav-item">
                            <a href="./index.html"><img src="./assets/system-logo.png" alt="Logo" class="logo"></a>
                        </div>
                        <div class="nav-item">
                            <div class="nav-sub-item"><a href="index.php">HOME</a></div>
                            <div class="nav-sub-item"><a href="ground.php">GROUND</a></div>
                            <div class="nav-sub-item"><a href="about.php">ABOUT US</a></div>
                            <div class="nav-sub-item">
                                <div class="dropdown">
                                    <button onclick="myFunction()" class="dropbtn">ACCOUNT</button>
                                    <div id="myDropdown" class="dropdown-content">
                                        <a href="<?php echo SITEURL; ?>user-profile.php?username=<?php echo $_SESSION['user']; ?>"><img src="./assets/user.png" alt="profile">MY PROFILE</a>
                                        <a href="<?php echo SITEURL; ?>booking-list.php?username=<?php echo $_SESSION['user']; ?>"><img src="./assets/list.png" alt="login">BOOKINGS</a> 
                                        <a href="./logout-user.php"><img src="./assets/login.png" alt="login">LOGOUT</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                <?php
            }

        ?>
            