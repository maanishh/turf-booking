<?php include('./partials/menu.php') ?>

<!-- main content start here -->
<div class="main">
        <p class="main-heading">GROUND INFORMATION</p>
        <br><br>

        <?php
            $id = $_GET['id'];  //Get id
            $sql = "SELECT * FROM ground WHERE gro_id=$id";   //SQL query
            $res = mysqli_query($conn, $sql);   //Execute the query

            if($res==TRUE)
            {
               $count = mysqli_num_rows($res);
               if($count==1)
               {
                    $rows = mysqli_fetch_assoc($res);

                    $gname = $rows['ground_name'];
                    $description = $rows['description'];
                    $price = $rows['price'];
                    $place = $rows['place'];
                    $image = $rows['picture'];
                    $status = $rows['status'];
                    $category = $rows['cat_id'];

                    $sql2 = "SELECT * FROM category WHERE cat_id=$category";   //SQL query
                    $res2 = mysqli_query($conn, $sql2);

                    $rows2 = mysqli_fetch_assoc($res2);
                    $category = $rows2['name'];

               }
            }
        ?>

        <div class="container">
            <div class="sub-container">
                <p class="form-heading">GROUND INFORMATION</p>
                <hr class="h-line">
                <form method="post">
                    <table class="info-ground-tbl">
                        <tr>
                            <td width="200px"><p>GROUND NAME : </p></td>
                            <td width="250px"><?php echo $gname; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><p>DESCRIPTION : </p></td>
                        </tr>
                        <tr>
                        <td colspan="2" align="center"><?php echo $description; ?></td>
                        </tr>
                        <tr>
                            <td><p>PRICE : </p></td>
                            <td><?php echo $price; ?></td>
                        </tr>
                        <tr>
                            <td><p>PLACE : </p></td>
                            <td><?php echo $place; ?></td>
                        </tr>
                        <tr>
                            <td><p>PICTURE : </p></td>
                            <td><img src="<?php echo SITEURL; ?>admin/assets/grounds/<?php echo $image; ?>" width="200px"></td>
                        </tr>
                        <tr>
                            <td width="200px"><p>STATUS : </p></td>
                            <td width="250px"><?php echo $status; ?></td>
                        </tr>
                        <tr>
                            <td width="200px"><p>CATEGORY : </p></td>
                            <td width="250px"><?php echo $category; ?></td>
                        </tr>
                    </table>
                    
                    <center><button name="submit" class="btn-submit">BACK TO MANAGE GROUND</button></center>
                </form>
            </div>
        </div>
</div>
<!-- main contant end here -->

<?php

    if(isset($_POST['submit']))
    {
        header("location:".SITEURL.'admin/manage-ground.php');
    }
?>