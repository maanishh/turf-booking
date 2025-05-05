<?php
    if(!isset($_SESSION['user']))   //if user session is not set
    {
        $_SESSION['no-login'] = "<div class='error'>Please Login First</div>";

        header('location:'.SITEURL.'login-user.php');
    }
?>