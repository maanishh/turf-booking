<?php include('./partials/menu.php'); ?>
            <div class="title">
                <h1 class="main-title">My Profile</h1>
                <!-- <hr class="h-line">
                <h3>Your Game, Your Time – Book The Perfect Sports Ground Now!</h3> -->
            </div>
        </div>

        <?php
            $username = $_GET['username'];
            
            $sql = "SELECT * FROM registration WHERE username='$username'";
            $res = mysqli_query($conn , $sql);

            if($res==TRUE)
            {
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    $rows = mysqli_fetch_assoc($res);

                    $id = $rows['reg_id'];
                    $fullname = $rows['fullname'];
                    $username = $rows['username'];
                    $gender = $rows['gender'];
                    $age = $rows['age'];
                    $dob = $rows['dob'];
                    $city = $rows['city'];
                    $contact = $rows['contact'];
                    $email = $rows['email'];
                }
            }
        ?>
        <br><br><br>
        <div class="center">
            <div class="profile">
                <h3>My Information</h3>
                <form method="post">
                    <table>
                        <tr>
                            <td><b>Full Name : </b></td>
                            <td ><input type="text" name="fullname" value="<?php echo $fullname; ?>" required></td>
                        </tr>
                        <tr>
                            <td><b>Username : </b></td>
                            <td><input type="text" name="username" value="<?php echo $username; ?>" required></td>
                        </tr>
                        <?php
                            if($gender=="Male")
                            {
                                ?>
                                <tr>
                                    <td>
                                        <b>Gender : </b>
                                    </td>
                                    <td>
                                        <input type="radio" class="pro-radio" name="gender" value="Male" required checked> MALE
                                        <input type="radio" class="pro-radio" name="gender" value="Female" required> FEMALE
                                    </td>
                                </tr>
                                <?php
                            }
                            else
                            {
                                ?>
                                <tr>
                                    <td>
                                        <b>Gender : </b>
                                    </td>
                                    <td>
                                        <input type="radio" class="pro-radio" name="gender" value="Male" required> MALE
                                        <input type="radio" class="pro-radio" name="gender" value="Female" required checked> FEMALE
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                        <tr>
                            <td><b>Age : </b></td>
                            <td><input type="text" name="age" value="<?php echo $age; ?>" required></td>
                        </tr>
                        <tr>
                            <td><b>Dob : </b></td>
                            <td><input type="text" name="dob" value="<?php echo $dob; ?>" required></td>
                        </tr>
                        <tr>
                            <td><b>City : </b></td>
                            <td><input type="text" name="city" value="<?php echo $city; ?>" required></td>
                        </tr>
                        <tr>
                            <td><b>Contact : </b></td>
                            <td><input type="text" name="contact" value="<?php echo $contact; ?>" required></td>
                        </tr>
                        <tr>
                            <td><b>Email : </b></td>
                            <td><input type="email" name="email" value="<?php echo $email; ?>" required></td>
                        </tr>
                    </table>
                    <center>  
                            <input type="submit" value="Update Profile" class="btn-submit" name="submit">
                    </center>
                </form>
            </div>
        </div>
        <br><br><br>

<?php include('./partials/footer.php') ?>

<?php
    if(isset($_POST['submit']))
    {
        $ufullname = $_POST['fullname'];
        $uusername = $_POST['username'];
        $ugender = $_POST['gender'];
        $uage = $_POST['age'];
        $udob = $_POST['dob'];
        $ucity = $_POST['city'];
        $ucontact = $_POST['contact'];
        $uemail = $_POST['email'];

        if($fullname == $ufullname && $username == $uusername && $gender == $ugender && $age == $uage && $dob == $udob && $city == $ucity && $contact == $ucontact && $email == $uemail)
        {
            $_SESSION['update'] = "<div class='error'>No Changes Found</div>";
            ?>
            <script>
                window.location.href = "<?php echo SITEURL.'user-profile.php?username='.$uusername; ?>"
            </script>
            <?php
        }
        else
        {
            $sql2 = "UPDATE registration SET fullname='$ufullname', username='$uusername', gender='$ugender', age='$uage', dob='$udob', city='$ucity', contact='$ucontact', email='$uemail' WHERE reg_id=$id";
            $res2 = mysqli_query($conn, $sql2) or die(mysqli_error());

            if($res2==TRUE)
            {
                $_SESSION['update'] = "<div class='success'>Profile Updated Successfully</div>";
                ?>
                    <script>
                        window.location.href = "<?php echo SITEURL.'user-profile.php?username='.$uusername; ?>"
                    </script>
                <?php
            }
            else
            {
                $_SESSION['update'] = "<div class='error'>Failed To Update Profile</div>";
                ?>
                    <script>
                        window.location.href = "<?php echo SITEURL.'user-profile.php?username='.$uusername; ?>"
                    </script>
                <?php
            }
        }
    }
?>