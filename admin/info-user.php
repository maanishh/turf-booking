<?php include('./partials/menu.php') ?>

<!-- main content start here -->
<div class="main">
        <p class="main-heading">USER INFORMATION</p>
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
                <p class="form-heading">USER INFORMATION</p>
                <hr class="h-line">
                <form method="post">
                    <table class="user-tbl">
                        <tr>
                            <td width="200px"><p>FULL NAME : </p></td>
                            <td width="250px"><?php echo $fullname; ?></td>
                        </tr>
                        <tr>
                            <td><p>USERNAME : </p></td>
                            <td><?php echo $username; ?></td>
                        </tr>
                        <tr>
                            <td><p>GENDER : </p></td>
                            <td><?php echo $gender; ?></td>
                        </tr>
                        <tr>
                            <td><p>AGE : </p></td>
                            <td><?php echo $age; ?></td>
                        </tr>
                        <tr>
                            <td><p>DOB : </p></td>
                            <td><?php echo $dob; ?></td>
                        </tr>
                        <tr>
                            <td><p>CITY : </p></td>
                            <td><?php echo $city; ?></td>
                        </tr>
                        <tr>
                            <td><p>CONTACT : </p></td>
                            <td><?php echo $contact; ?></td>
                        </tr>
                        <tr>
                            <td><p>EMAIL : </p></td>
                            <td><?php echo $email; ?></td>
                        </tr>

                    </table>
                    
                    <center><button name="submit" class="btn-submit">BACK TO MANAGE USER</button></center>
                </form>
            </div>
        </div>
</div>
<!-- main contant end here -->

<?php

    if(isset($_POST['submit']))
    {
        header("location:".SITEURL.'admin/manage-user.php');
    }
?>