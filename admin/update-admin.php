<?php include('./partials/menu.php') ?>

<!-- main content start here -->
    <div class="main">
        <p class="main-heading">UPDATE ADMIN</p>
        <br><br>
        <?php
            $id = $_GET['id'];  //Get id
            $sql = "SELECT * FROM admin WHERE admin_id=$id";   //SQL query
            $res = mysqli_query($conn, $sql);   //Execute the query

            if($res==TRUE)
            {
               $count = mysqli_num_rows($res);
               if($count==1)
               {
                    $rows = mysqli_fetch_assoc($res);

                    $fullname = $rows['fullname'];
                    $username = $rows['username'];
                    $email = $rows['email'];
               }
            }
        ?>
        <div class="container">
            <div class="sub-container">
                <p class="form-heading">UPDATE ADMIN</p>
                <hr class="h-line">
                <form method="post">
                    <p>FULL NAME :</p><input type="text" class="add-admin-input" name="fullname" value="<?php echo $fullname; ?>"><br>
                    <p>USERNAME :</p><input type="text" class="add-admin-input" name="username" value="<?php echo $username; ?>"><br>
                    <p>EMAIL :</p><input type="text" class="add-admin-input" name="email" value="<?php echo $email; ?>"><br>
                    <button name="submit" class="btn-submit">UPDATE ADMIN</button>
                </form>
            </div>
        </div>
    </div>

<!-- main contant end here -->


<?php
if(isset($_POST['submit']))
{
    //Get data from form
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    //SQL query for store data
    $sql = "UPDATE admin SET fullname='$fullname', username='$username', email='$email' WHERE admin_id=$id";

    //Executing query and store data into database
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //Data inserted or not
    if($res==TRUE)
    {
        $_SESSION['update-admin'] = "<div class='success'>Admin Updated Successfully</div>";
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else
    {
        $_SESSION['update-admin'] = "<div class='error'>Failed To Update Admin</div>";
        header("location:".SITEURL.'admin/manage-admin.php');
    }
}
?>