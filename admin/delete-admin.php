<?php

    include('../config/constants.php');
    
    $id = $_GET['id'];  //Get id of admin

    $sql = "DELETE FROM admin WHERE admin_id = $id";    //SQL query
    $res = mysqli_query($conn, $sql);   //Execute query

    if($res==TRUE)
    {
        $_SESSION['delete-admin'] = "<div class='success'>Admin Deleted Successfully</div>";
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else
    {
        $_SESSION['delete-admin'] = "<div class='error'>Failed To Delete Admin. Try Again</div>";
        header("location:".SITEURL.'admin/manage-admin.php');
    }



?>