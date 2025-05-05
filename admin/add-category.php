<?php include('./partials/menu.php') ?>

<!-- main content start here -->
<div class="main">
        <p class="main-heading">ADD CATEGORY</p>
        <br><br>

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
                                <input type="text" class="add-user-input" name="name" placeholder="Enter Category Name" id="cn" required>
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
                        </table>
                    <center>
                        <button name="submit" class="btn-submit">ADD CATEGORY</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
<!-- main contant end here -->

<?php

    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $status = $_POST['status'];

        //SQL query for store data
        $sql = "INSERT INTO category SET name='$name', status='$status'";

        //Executing query and store data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //Data inserted or not
        if($res==true)
        {
            $_SESSION['add-category'] = "<div class='success'>Category Added Successfully</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            $_SESSION['add-category'] = "<div class='error'>Failed To Add Category</div>";
            header("location:".SITEURL.'admin/manage-category.php');
        }
    }

?>