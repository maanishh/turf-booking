<?php include('./partials/menu.php') ?>

<!-- main content start here -->
<div class="main">
        <p class="main-heading">UPDATE GROUND</p>
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

                    $name = $rows['ground_name'];
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
            <div class="sub-container user-sub-container">
                <form method="post">
                <p class="form-heading">GROUND</p>
                <hr class="h-line">
                    
                    <table class="user-tbl">    
                        <tr>
                            <td width="200px">
                                <label for="cn">GROUND NAME :</label>
                            </td>
                            <td>
                                <input type="text" class="add-user-input" name="name" placeholder="Enter Category Name" id="cn" value="<?php echo $name; ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="description">DESCRIPTION : </label>
                            </td>
                            <td>
                                <input type="text" class="add-user-input" name="description" id="description" value="<?php echo $description; ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="price">PRICE : </label>
                            </td>
                            <td>
                                <input type="text" class="add-user-input" name="price" id="price" value="<?php echo $price; ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="place">PLACE : </label>
                            </td>
                            <td>
                                <input type="text" class="add-user-input" name="place" id="place" value="<?php echo $place; ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="pic">PICTURE : </label>
                            </td>
                            <td>
                                <img src="<?php echo SITEURL; ?>admin/assets/grounds/<?php echo $image; ?>" width="150px">
                                <input type="file" name="image" id="pic">
                            </td>
                        </tr>
                        <?php
                            if($status=="Active")
                            {
                                ?>
                                <tr>
                                    <td>
                                        <label>STATUS :</label>
                                    </td>
                                    <td>
                                        <input type="radio" name="status" value="Active" checked> ACTIVE
                                        <input type="radio" name="status" value="Unactive"> UNACTIVE
                                    </td>
                                </tr>
                                <?php
                            }
                            else
                            {
                                ?>
                                <tr>
                                    <td>
                                        <label>STATUS :</label>
                                    </td>
                                    <td>
                                        <input type="radio" name="status" value="Active"> ACTIVE
                                        <input type="radio" name="status" value="Unactive" checked> UNACTIVE
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                        <tr>
                            <td>
                                <label for="price">CATEGORY : </label>
                            </td>
                            <td>
                                <input type="text" class="add-user-input" name="category" id="price" value="<?php echo $category; ?>" required readonly>
                                <select name="category">
                                <?php

                                    $sql3 = "SELECT * FROM category WHERE status='Active'";
                                    $res3 = mysqli_query($conn, $sql3);

                                    $count = mysqli_num_rows($res3);

                                    if($count>0)
                                    {
                                        while($row = mysqli_fetch_assoc($res3))
                                        {
                                            $cat_id = $row['cat_id'];
                                            $name = $row['name'];
                                            ?>
                                                <option value="<?php echo $cat_id; ?>"><?php echo $name; ?></option>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                            <option value="0">No Category</option>
                                        <?php
                                    }
                                ?>
                                </select>
                            </td>
                        </tr>
                        </table>
                    <center>
                        <button name="submit" class="btn-submit">UPDATE GROUND</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
<!-- main contant end here -->
 
<?php
if(isset($_POST['submit']))
{
    //Get data from form
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $place = $_POST['place'];
    $image = $_POST['image'];
    $status = $_POST['status'];
    $category = $_POST['category'];

    if(($_POST['image']) !== "")
    {
        $sql4 = "UPDATE ground SET ground_name='$name', description='$description', price='$price', place='$place', picture='$image', status='$status', cat_id='$category' WHERE gro_id=$id";
    }
    else
    {
        $sql4 = "UPDATE ground SET ground_name='$name', description='$description', price='$price', place='$place', status='$status', cat_id='$category' WHERE gro_id=$id";
    }
    //SQL query for store data
    // $sql4 = "UPDATE ground SET ground_name='$name', description='$description', price='$price', picture='$image', status='$status', cat_id='$category' WHERE gro_id=$id";

    //Executing query and store data into database
    $res4 = mysqli_query($conn, $sql4) or die(mysqli_error());

    //Data inserted or not
    if($res4==TRUE)
    {
        $_SESSION['update-ground'] = "<div class='success'>Ground Updated Successfully</div>";
        ?>
        <script>
            window.location.href = "<?php echo SITEURL.'admin/manage-ground.php'; ?>"
        </script>
        <?php
    }
    else
    {
        $_SESSION['update-ground'] = "<div class='error'>Failed To Update Ground</div>";
        ?>
        <script>
            window.location.href = "<?php echo SITEURL.'admin/manage-ground.php'; ?>"
        </script>
        <?php
    }
}

?>