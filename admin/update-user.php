<?php include('./partials/menu.php') ?>

<!-- main content start here -->
    <div class="main">
        <p class="main-heading">UPDATE USER</p>
        <br><br>
        <?php
            $id = $_GET['id'];  //Get id
            $sql = "SELECT * FROM registration WHERE reg_id=$id";   //SQL query
            $res = mysqli_query($conn, $sql);   //Execute the query

            if($res==TRUE)
            {
               $count = mysqli_num_rows($res);
               if($count==1)
               {
                    $rows = mysqli_fetch_assoc($res);

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

        <div class="container">
            <div class="sub-container">
                <p class="form-heading">UPDATE USER</p>
                <hr class="h-line">
                <form method="post">
                <table class="user-tbl">    
                        <tr>
                            <td width="200px">
                                <label for="fn">FULL NAME :</label>
                            </td>
                            <td>
                                <input type="text" class="add-user-input" name="fullname" placeholder="Enter Full Name" id="fn" value="<?php echo $fullname; ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <label for="un">USERNAME :</label>
                            </td>
                            <td><input type="text" class="add-user-input" name="username" placeholder="Enter Username" id="un" value="<?php echo $username; ?>" required></td>
                        </tr>
                        <?php
                            if($gender=="Male")
                            {
                                ?>
                                <tr>
                                    <td>
                                        <label>GENDER :</label>
                                    </td>
                                    <td>
                                        <input type="radio" name="gender" value="Male" required checked> MALE
                                        <input type="radio" name="gender" value="Female" required> FEMALE
                                    </td>
                                </tr>
                                <?php
                            }
                            else
                            {
                                ?>
                                <tr>
                                    <td>
                                        <label>GENDER :</label>
                                    </td>
                                    <td>
                                        <input type="radio" name="gender" value="Male" required> MALE
                                        <input type="radio" name="gender" value="Female" required checked> FEMALE
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                        <tr>
                            <td>
                                <label for="age">AGE :</label>
                            </td>
                            <td>
                                <input type="text" class="add-user-input" name="age" placeholder="Enter Age" id="age" value="<?php echo $age; ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="dob">DOB :</label>
                            </td>
                            <td>
                                <input type="date" name="dob" id="dob" value="<?php echo $dob; ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="city">CITY :</label>
                            </td>
                            <td>
                                <input type="text" class="add-user-input" name="city" placeholder="Enter City" id="city" value="<?php echo $city; ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="contact">CONTACT :</label>
                            </td>
                            <td>
                                <input type="text" class="add-user-input" name="contact" placeholder="Enter Contact Number" id="contact" value="<?php echo $contact; ?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="email">EMAIL :</label>
                            </td>
                            <td>
                                <input type="email" class="add-user-input" name="email" placeholder="Enter Email" id="email" required value="<?php echo $email; ?>" required>
                            </td>
                        </tr>
                    </table>
                    <center>
                        <button name="submit" class="btn-submit">UPDATE USER</button>
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
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $dob = $_POST['dob'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    //SQL query for store data
    $sql2 = "UPDATE registration SET fullname='$fullname', username='$username', gender='$gender', age='$age', dob='$dob', city='$city', contact='$contact', email='$email' WHERE reg_id=$id";

    //Executing query and store data into database
    $res2 = mysqli_query($conn, $sql2) or die(mysqli_error());

    //Data inserted or not
    if($res2==TRUE)
    {
        $_SESSION['update-user'] = "<div class='success'>User Updated Successfully</div>";
        ?>
            <script>
                window.location.href = "<?php echo SITEURL.'admin/manage-user.php'; ?>"
            </script>
        <?php
    }
    else
    {
        $_SESSION['update-user'] = "<div class='error'>Failed To Update User</div>";
        ?>
            <script>
                window.location.href = "<?php echo SITEURL.'admin/manage-user.php'; ?>"
            </script>
        <?php
    }
}

?>