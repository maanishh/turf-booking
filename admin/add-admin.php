<?php include('./partials/menu.php') ?>

<!-- main content start here -->
    <div class="main">
        <p class="main-heading">ADD ADMIN</p>
        <br><br>
            <?php
                if(isset($_SESSION['add']))
                {
                    echo "<p class='returnmsg'>" .$_SESSION['add'] ."</p>"; //Display session message
                    unset($_SESSION['add']); //Removing session message
                }
                if(isset($_SESSION['add-admin']))
                {
                    echo $_SESSION['add-admin'];
                    unset($_SESSION['add-admin']);
                }
            ?>
        <div class="container">
            <div class="sub-container">
                <p class="form-heading">ADD ADMIN</p>
                <hr class="h-line">
                <form method="post">
                    <input type="text" class="add-admin-input" name="fullname" placeholder="FULL NAME" required><br>
                    <input type="text" class="add-admin-input" name="username" placeholder="USERNAME" required><br>
                    <input type="text" class="add-admin-input" name="email" placeholder="EMAIL" required><br>
                    <input type="password" class="add-admin-input" name="password" placeholder="PASSWORD" required><br>
                    <input type="password" class="add-admin-input" name="cnf-password" placeholder="CONFIRM PASSWORD" required><br>
                    <button name="submit" class="btn-submit">ADD ADMIN</button>
                </form>
            </div>
        </div>
        <br><br>
    </div>

<!-- main contant end here -->

<?php

if(isset($_POST['submit']))
{
    
    //Get data from form
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cnf-password']);

    if($password == $cpassword)
    {
        //SQL query for store data
        $sql = "INSERT INTO admin SET fullname='$fullname', username='$username', email='$email', password='$password'";

        //Executing query and store data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //Data inserted or not
        if($res==TRUE)
        {
            $_SESSION['add-admin'] = "<div class='success'>Admin Added Successfully</div>";
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            $_SESSION['add-admin'] = "<div class='error'>Failed To Add Admin</div>";
            header("location:".SITEURL.'admin/manage-admin.php');
        }
    }
    else
    {
        $_SESSION['add-admin'] = "<div class='error'>Please Enter Same Password</div>";
        header("location:".SITEURL.'admin/add-admin.php');
    }
}

?>