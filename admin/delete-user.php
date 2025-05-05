<?php

    include('../config/constants.php');
    
    $id = $_GET['id'];  //Get id of admin

    $sql = "DELETE FROM registration WHERE reg_id = $id";    //SQL query
    $res = mysqli_query($conn, $sql);   //Execute query

    if($res==TRUE)
    {
        $_SESSION['delete-user'] = "<div class='success'>User Deleted Successfully</div>";
        header("location:".SITEURL.'admin/manage-user.php');
    }
    else
    {
        $_SESSION['delete-user'] = "<div class='error'>Failed To Delete User. Try Again</div>";
        header("location:".SITEURL.'admin/manage-user.php');
    }



?>