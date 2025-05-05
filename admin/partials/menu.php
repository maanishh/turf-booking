<?php 

    include('../config/constants.php');
    include('login-check.php');
    
?>

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
    <!--menu section start-->
    <div class="menu">
        <nav class="nav">
            <div class="nav-item">
            <div class="nav-sub-item"><a href="./index.php">DASHBOARD</a></div>
            </div>
            <div class="nav-item">
                <div class="nav-sub-item"><a href="./manage-admin.php">ADMIN</a></div>
                <div class="nav-sub-item"><a href="./manage-user.php">USER</a></div>
                <div class="nav-sub-item"><a href="./manage-category.php">CATEGORY</a></div>
                <div class="nav-sub-item"><a href="./manage-ground.php">GROUND</a></div>
                <div class="nav-sub-item"><a href="./manage-booking.php">BOOKING</a></div>
            </div>
            <div class="nav-item">
                <div class="nav-sub-item"><a href="./logout-admin.php">LOGOUT</a></div>
            </div>
        </nav>
        <hr>
    </div>
    <!--menu section end-->