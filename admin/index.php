<?php include('./partials/menu.php') ?>

<!--main content section start-->
<div class="main">
    <p class="main-heading">DASHBOARD</p>
    <br>
    <?php

        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }

    ?>
    <br>
    
    <?php
            //Admin
            $sql1 = "SELECT * FROM admin";   //SQL query
            $res1 = mysqli_query($conn, $sql1);   //Execute the query

            if($res1==TRUE)
            {
               $count1 = mysqli_num_rows($res1);
            }

            //User
            $sql2 = "SELECT * FROM registration";   //SQL query
            $res2 = mysqli_query($conn, $sql2);   //Execute the query

            if($res2==TRUE)
            {
               $count2 = mysqli_num_rows($res2);
            }

            //Category
            $sql3 = "SELECT * FROM category";   //SQL query
            $res3 = mysqli_query($conn, $sql3);   //Execute the query

            if($res3==TRUE)
            {
               $count3 = mysqli_num_rows($res3);
            }

            //Ground
            $sql4 = "SELECT * FROM ground";   //SQL query
            $res4 = mysqli_query($conn, $sql4);   //Execute the query

            if($res4==TRUE)
            {
               $count4 = mysqli_num_rows($res4);
            }

            //Booking
            $sql5 = "SELECT * FROM ground";   //SQL query
            $res5 = mysqli_query($conn, $sql5);   //Execute the query

            if($res5==TRUE)
            {
               $count5 = mysqli_num_rows($res5);
            }

        ?>


    <div class="submain">
        <div class="submain-item">
            <p>ADMINS</p>
            <h2><?php echo $count1; ?></h2>
        </div>
        <div class="submain-item">
            <p>USERS</p>
            <h2><?php echo $count2; ?></h2>
        </div>
        <div class="submain-item">
            <p>TOTAL CATEGORIES</p>
            <h2><?php echo $count3; ?></h2>
        </div>
        <div class="submain-item">
            <p>TOTAL GROUNDS</p>
            <h2><?php echo $count4; ?></h2>
        </div>
        <div class="submain-item">
            <p>BOOKINGS</p>
            <h2><?php echo $count5; ?></h2>
        </div>
    </div>
    <br><br><br><br><br><br>
</div>
<!--main content section end-->