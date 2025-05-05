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
        <br>
        <center>
            <?php
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>
        </center>
        <br><br>
        <div class="center">
            <div class="profile">
                <h3>My Information</h3>
                <table>
                    <tr>
                        <td><b>Full Name : </b></td>
                        <td><?php echo $fullname; ?></td>
                    </tr>
                    <tr>
                        <td><b>Username : </b></td>
                        <td><?php echo $username; ?></td>
                    </tr>
                    <tr>
                        <td><b>Gender : </b></td>
                        <td><?php echo $gender; ?></td>
                    </tr>
                    <tr>
                        <td><b>Age : </b></td>
                        <td><?php echo $age; ?></td>
                    </tr>
                    <tr>
                        <td><b>Dob : </b></td>
                        <td><?php echo $dob; ?></td>
                    </tr>
                    <tr>
                        <td><b>City : </b></td>
                        <td><?php echo $city; ?></td>
                    </tr>
                    <tr>
                        <td><b>Contact : </b></td>
                        <td><?php echo $contact; ?></td>
                    </tr>
                    <tr>
                        <td><b>Email : </b></td>
                        <td><?php echo $email; ?></td>
                    </tr>
                </table>
                <center>
                    <a href="./update-profile.php?username=<?php echo $username; ?>">
                        <input type="button" value="Update Profile" class="btn-submit">
                    </a>
                </center>
            </div>
        </div>
        <br><br><br>
<?php include('./partials/footer.php') ?>