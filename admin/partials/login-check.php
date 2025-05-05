<?php

    if(!isset($_SESSION['admin']))   //if user session is not set
    {
        $_SESSION['no-login'] = "<div class='error'>Please Login To Acess Admin Panel</div>";

        header('location:'.SITEURL.'admin/login-admin.php');
    }

?>