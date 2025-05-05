<?php include('./partials/menu.php') ?>

<!-- main content start here -->
    <div class="main">
        <p class="main-heading">ADD USER</p>
        <br><br>
        <?php
            if(isset($_SESSION['add-user']))
            {
                echo $_SESSION['add-user'];
                unset($_SESSION['add-user']);
            }
        ?>
        <div class="container">
            <div class="sub-container user-sub-container">
                <form method="post">
                <p class="form-heading">USER</p>
                <hr class="h-line">
                    
                    <table class="user-tbl">    
                        <tr>
                            <td width="200px">
                                <label for="fn">FULL NAME :</label>
                            </td>
                            <td>
                                <input type="text" class="add-user-input" name="fullname" placeholder="Enter Full Name" id="fn" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label for="un">USERNAME :</label>
                            </td>
                            <td><input type="text" class="add-user-input" name="username" placeholder="Enter Username" id="un" required></td>
                        </tr>
                        <tr>
                            <td>
                                <label>GENDER :</label>
                            </td>
                            <td>
                            <input type="radio" name="gender" value="Male" required> MALE
                            <input type="radio" name="gender" value="Female" required> FEMALE
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label for="age">AGE :</label>
                            </td>
                            <td><input type="text" class="add-user-input" name="age" placeholder="Enter Age" id="age" required></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="dob">DOB :</label>
                            </td>
                            <td>
                                <input type="date" name="dob" id="dob" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="city">CITY :</label>
                            </td>
                            <td>
                                <input type="text" class="add-user-input" name="city" placeholder="Enter City" id="city" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="contact">CONTACT :</label>
                            </td>
                            <td>
                                <input type="text" class="add-user-input" name="contact" placeholder="Enter Contact Number" id="contact" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email">EMAIL :</label>
                            </td>
                            <td>
                                <input type="email" class="add-user-input" name="email" placeholder="Enter Email" id="email" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="password">PASSWORD :</label>
                            </td>
                            <td>
                                <input type="password" class="add-user-input" name="password" placeholder="Enter Password" id="password" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="c-password"  class="tbl-user">CONFIRM PASSWORD :</label>
                            </td>
                            <td>
                                <input type="password" class="add-user-input" name="cpassword" placeholder="Enter Password Again" id="c-password" required>
                            </td>
                        </tr>
                    </table>
                    <center>
                        <button name="submit" class="btn-submit">ADD USER</button>
                    </center>
                </form>
            </div>
        </div>
    </div>
<!-- main contant end here -->

<?php

    if(isset($_POST['submit']))
    {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $dob = $_POST['dob'];
        $city = $_POST['city'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);

        if($password == $cpassword)
        {
            //SQL query for store data
            $sql = "INSERT INTO registration SET fullname='$fullname', username='$username', gender='$gender', age='$age', dob='$dob', city='$city', contact='$contact', email='$email', password='$password'";

            //Executing query and store data into database
            $res = mysqli_query($conn, $sql) or die(mysqli_error());

            //Data inserted or not
            if($res==true)
            {
                $_SESSION['add-user'] = "<div class='success'>User Added Successfully</div>";
                ?>
                <script>
                    window.location.href = "<?php echo SITEURL.'admin/manage-user.php'; ?>"
                </script>
                <?php
                //header("location:".SITEURL.'admin/manage-user.php');
            }
            else
            {
                $_SESSION['add-user'] = "<div class='error'>Failed To Add User</div>";
                ?>
                <script>
                    window.location.href = "<?php echo SITEURL.'admin/manage-user.php'; ?>"
                </script>
                <?php
                //header("location:".SITEURL.'admin/manage-user.php');
            }
        }
        else
        {
            $_SESSION['add-user'] = "<div class='error'>Please Enter Same Password</div>";
            ?>
            <script>
                window.location.href = "<?php echo SITEURL.'admin/add-user.php'; ?>"
            </script>
            <?php
        }
    }

?>