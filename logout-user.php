<?php
    include('config/constants.php');
    session_destroy(); //Unset $_SESSION['user']
    header('location:' .SITEURL.'index.php');
?>