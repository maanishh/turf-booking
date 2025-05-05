<?php include('./partials/menu.php') ?>

<!-- main content start here -->
    <div class="main">
        <p class="main-heading">ADD GROUND</p>
        <br><br>

        <div class="container">
            <div class="sub-container user-sub-container">
                <!-- upload image with enctype property -->
                <form method="post" enctype="multipart/form-data">
                <p class="form-heading">GROUND</p>
                <hr class="h-line">
                    
                    <table class="user-tbl">    
                        <tr>
                            <td width="200px">
                                <label for="gn">GROUND NAME :</label>
                            </td>
                            <td>
                                <input type="text" class="add-user-input" name="gname" placeholder="Enter Ground Name" id="gn" required>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <label for="description">DESCRIPTION</label>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><textarea name="description" id="description" rows="15" cols="80" placeholder="Enter Description..."></textarea></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="price">PRICE :</label>
                            </td>
                            <td><input type="number" class="add-user-input" name="price" id="price" placeholder="Enter Price" required></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="place">PLACE :</label>
                            </td>
                            <td><input type="text" class="add-user-input" name="place" id="place" placeholder="Enter Place" required></td>
                        </tr>
                        <tr  height="80px">
                            <td>
                                <label for="pic">PICTURE :</label>
                            </td>
                            <td>
                                <input type="file" name="image" id="pic" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>STATUS :</label>
                            </td>
                            <td>
                                <input type="radio" name="status" value="Active" required> ACTIVE
                                <input type="radio" name="status" value="Unactive" required> UNACTIVE
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="pic">CATEGORY :</label>
                            </td>
                            <td>
                                <select name="category">
                                <?php

                                    $sql = "SELECT * FROM category WHERE status='Active'";
                                    $res = mysqli_query($conn, $sql);

                                    $count = mysqli_num_rows($res);

                                    if($count>0)
                                    {
                                        while($row = mysqli_fetch_assoc($res))
                                        {
                                            $id = $row['cat_id'];
                                            $name = $row['name'];
                                            ?>
                                                <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
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
                        <button name="submit" class="btn-submit">ADD GROUND</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
<!-- main contant end here -->

<?php

    if(isset($_POST['submit']))
    {
        $gname = $_POST['gname'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $place = $_POST['place'];
        $image = $_FILES['image'];
        $status = $_POST['status'];
        $category = $_POST['category'];


        if(isset($_FILES['image']['name']))
        {
            $image_name = $_FILES['image']['name'];
            $s_path = $_FILES['image']['tmp_name'];
            $d_path = "./assets/grounds/". $image_name;

            $upload = move_uploaded_file($s_path, $d_path);

            if($upload==False)
            {
                $_SESSION['upload'] = "<div class='error'>Failed To Upload Image</div>";
                header("location:".SITEURL.'admin/manage-ground.php');
                die();
            }
        }


        //SQL query for store data
        $sql2 = "INSERT INTO ground SET ground_name='$gname', description='$description', price='$price', place='$place', picture='$image_name', status='$status', cat_id='$category'";

        //Executing query and store data into database
        $res2 = mysqli_query($conn, $sql2);

        //Data inserted or not
        if($res2==true)
        {
            $_SESSION['add-ground'] = "<div class='success'>Ground Added Successfully</div>";
            ?>
            <script>
                window.location.href = "<?php echo SITEURL.'admin/manage-ground.php'; ?>"
            </script>
            <?php
        }
        else
        {
            $_SESSION['add-ground'] = "<div class='error'>Failed To Add Ground</div>";
            ?>
            <script>
                window.location.href = "<?php echo SITEURL.'admin/manage-ground.php'; ?>"
            </script>
            <?php
        }
    }

?>