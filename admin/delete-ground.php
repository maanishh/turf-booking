<?php

    include('../config/constants.php');

    if(isset($_GET['id']) && isset($_GET['image']))
    {

        $id = $_GET['id'];  //Get id of admin
        $image = $_GET['image'];

        if($image !== "")
        {
            $path = "./assets/grounds/".$image;

            $remove = unlink($path);

            if($remove==false)
            {
                $_SESSION['delete-ground'] = "<div class='error'>Failed To Delete Ground. Try Again</div>";
                header("location:".SITEURL.'admin/manage-ground.php');
                die();
            }
        }

        $sql = "DELETE FROM ground WHERE gro_id = $id";    //SQL query
        $res = mysqli_query($conn, $sql);   //Execute query

        if($res==TRUE)
        {
            $_SESSION['delete-ground'] = "<div class='success'>Ground Deleted Successfully</div>";
            header("location:".SITEURL.'admin/manage-ground.php');
        }
        else
        {
            $_SESSION['delete-ground'] = "<div class='error'>Failed To Delete Ground. Try Again</div>";
            header("location:".SITEURL.'admin/manage-ground.php');
        }
    }


?>