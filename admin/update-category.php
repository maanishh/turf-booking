<?php include('./partials/menu.php') ?>

<!-- main content start here -->
<div class="main">
        <p class="main-heading">UPDATE CATEGORY</p>
        <br><br>

        <?php
            $id = $_GET['id'];  //Get id
            $sql = "SELECT * FROM category WHERE cat_id=$id";   //SQL query
            $res = mysqli_query($conn, $sql);   //Execute the query

            if($res==TRUE)
            {
               $count = mysqli_num_rows($res);
               if($count==1)
               {
                    $rows = mysqli_fetch_assoc($res);

                    $name = $rows['name'];
                    $status = $rows['status'];
               }
            }
        ?>

        <div class="container">
            <div class="sub-container user-sub-container">
                <form method="post">
                <p class="form-heading">CATEGORY</p>
                <hr class="h-line">
                    
                    <table class="user-tbl">    
                        <tr>
                            <td width="200px">
                                <label for="cn">CATEGORY NAME :</label>
                            </td>
                            <td>
                                <input type="text" class="add-user-input" name="name" placeholder="Enter Category Name" id="cn" value="<?php echo $name; ?>" required>
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
                                        <input type="radio" name="status" value="Active" required checked> ACTIVE
                                        <input type="radio" name="status" value="Unactive" required> UNACTIVE
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
                                        <input type="radio" name="status" value="Active" required> ACTIVE
                                        <input type="radio" name="status" value="Unactive" required checked> UNACTIVE
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                        </table>
                    <center>
                        <button name="submit" class="btn-submit">UPDATE CATEGORY</button>
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
    $status = $_POST['status'];

    //SQL query for store data
    $sql2 = "UPDATE category SET name='$name', status='$status' WHERE cat_id=$id";

    //Executing query and store data into database
    $res2 = mysqli_query($conn, $sql2) or die(mysqli_error());

    //Data inserted or not
    if($res2==TRUE)
    {
        $_SESSION['update-category'] = "<div class='success'>Category Updated Successfully</div>";
        header("location:".SITEURL.'admin/manage-category.php');
    }
    else
    {
        $_SESSION['update-category'] = "<div class='error'>Failed To Update Category</div>";
        header("location:".SITEURL.'admin/manage-category.php');
    }
}

?>