<?php include('./partials/menu.php'); ?>
    
    <!--main content section start-->
    <div class="main">
        <p class="main-heading">CHANGE PASSWORD</p>
        <br><br>

        <?php
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
            }
        ?>
        <div class="container">
            <div class="sub-container user-sub-container">
                <form method="post">
                <p class="form-heading">PASSWORD</p>
                <hr class="h-line">
                    
                    <table class="user-tbl">    
                        <tr>
                            <td width="200px">
                                <label for="c-password">CURRENT PASSWORD :</label>
                            </td>
                            <td>
                                <input type="password" class="add-user-input" name="current_password" placeholder="Enter Current Password" id="c-password">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="n-password">NEW PASSWORD :</label>
                            </td>
                            <td>
                                <input type="password" class="add-user-input" name="new_password" placeholder="Enter New Password" id="n-password">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="cn-password">CONFIRM PASSWORD :</label>
                            </td>
                            <td>
                                <input type="password" class="add-user-input" name="confirm_password" placeholder="Retype New Password" id="cn-password">
                            </td>
                        </tr>
                    </table>
                    <center>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button name="submit" class="btn-submit">UPDATE PASSWORD</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
    <!--main content section end-->

<?php
    if(isset($_POST['submit'])){
        
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);
        
        $sql = "SELECT * FROM admin WHERE admin_id=$id AND password='$current_password'";

        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            $count = mysqli_num_rows($res);
            if($count==1)
            {
                if($new_password == $confirm_password)
                {
                    $sql2 = "UPDATE admin SET password='$new_password' WHERE admin_id=$id";
                    $res2 = mysqli_query($conn, $sql2);

                    if($res2==true)
                    {
                        $_SESSION['change-password'] = "<div class='success'>Password Changed Successfully</div>";
                        header("location:".SITEURL.'admin/manage-admin.php');
                    }
                    else
                    {
                        $_SESSION['change-password'] = "<div class='error'>Failed To Change Password</div>";
                        header("location:".SITEURL.'admin/manage-admin.php');
                    }
                }
                else
                {
                    $_SESSION['pwd-not-match'] = "<div class='error'>Password Not Match</div>";
                    header("location:".SITEURL.'admin/manage-admin.php');
                }

            }
            else
            {
                $_SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";
                header("location:".SITEURL.'admin/manage-admin.php');
            }
        }
        
    }
?>