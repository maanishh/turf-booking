<?php

    include('../config/constants.php');
    
    $id = $_GET['id'];  //Get id of admin

    $sql = "DELETE FROM category WHERE cat_id = $id";    //SQL query
    $res = mysqli_query($conn, $sql);   //Execute query

    if($res==TRUE)
    {
        $_SESSION['delete-categroy'] = "<div class='success'>Category Deleted Successfully</div>";
        header("location:".SITEURL.'admin/manage-category.php');
    }
    else
    {
        $_SESSION['delete-categroy'] = "<div class='error'>Failed To Delete Category. Try Again</div>";
        header("location:".SITEURL.'admin/manage-category.php');
    }



?>