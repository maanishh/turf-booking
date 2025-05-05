<?php include('./partials/menu.php'); ?>

    <div class="main">
        <p class="main-heading">MANAGE USERS</p>


        <?php
            if(isset($_SESSION['add-user']))
            {
                echo $_SESSION['add-user']; //Display session message
                unset($_SESSION['add-user']); //Removing session message
            }
            if(isset($_SESSION['update-user']))
            {
                echo $_SESSION['update-user'];
                unset($_SESSION['update-user']);
            }
            if(isset($_SESSION['delete-user']))
            {
                echo $_SESSION['delete-user'];
                unset($_SESSION['delete-user']);
            }
        ?>
        

        <br><br>
        <a href="./add-user.php"><button class="btnblue">ADD USER</button></a>
        <br><br><br>
        <div class="tbl-align">
            <table class="admintbl">
                <tr>
                    <th>S.N.</th>
                    <th>FULL NAME</th>
                    <th>USERNAME</th>
                    <th>Email</th>
                    <th>ACTIONS</th>

                </tr>
                <?php
                    $sql = "SELECT * FROM registration";
                    $res = mysqli_query($conn, $sql);

                    if($res==TRUE)
                    {
                        $count = mysqli_num_rows($res); //Get rows
                        $sn = 1;
                        if($count>0)
                        {
                            while($rows = mysqli_fetch_assoc($res))
                            {
                                $id = $rows['reg_id'];
                                $fullname = $rows['fullname'];
                                $username = $rows['username'];
                                $email = $rows['email'];

                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $fullname; ?></td>
                                    <td><?php echo $username ; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td>
                                        <div class="tbl-align">
                                            <a href="<?php echo SITEURL; ?>admin/update-user.php?id=<?php echo $id; ?>"><button class="btngreen">UPDATE</button></a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-user.php?id=<?php echo $id; ?>"><button class="btnred">DELETE</button></a>
											<a href="<?php echo SITEURL; ?>admin/info-user.php?id=<?php echo $id; ?>"><button class="btninfo">USER INFO</button></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            //Not have data in db
                            ?>
                            <tr height="150px">
                                <td colspan="4"><center>No Admin Available In Database.</center></td>
                            </tr>
                            <?php
                        }
                        
                    }

                ?>
            </table>
    </div>
