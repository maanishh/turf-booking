<?php include('./partials/menu.php'); ?>
    
    <!--main content section start-->
    <div class="main">
        <p class="main-heading">MANAGE ADMIN</p>

        <?php
            if(isset($_SESSION['add-admin']))
            {
                echo $_SESSION['add-admin']; //Display session message
                unset($_SESSION['add-admin']); //Removing session message
            }
            if(isset($_SESSION['delete-admin']))
            {
                echo $_SESSION['delete-admin']; //Display session message
                unset($_SESSION['delete-admin']); //Removing session message
            }
            if(isset($_SESSION['update-admin']))
            {
                echo $_SESSION['update-admin']; //Display session message
                unset($_SESSION['update-admin']); //Removing session message
            }
            if(isset($_SESSION['user-not-found']))
            {
                echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
            }
            if(isset($_SESSION['pwd-not-match']))
            {
                echo $_SESSION['pwd-not-match'];
                unset($_SESSION['pwd-not-match']);
            }
            if(isset($_SESSION['change-password']))
            {
                echo $_SESSION['change-password'];
                unset($_SESSION['change-password']);
            }

        ?>
        <br><br>
        <a href="./add-admin.php"><button class="btnblue">ADD ADMIN</button></a>
        <br><br><br>
        <div class="tbl-align">
            <table class="admintbl">
                <tr>
                    <th>S.N.</th>
                    <th>FULL NAME</th>
                    <th>USERNAME</th>
                    <th>EMAIL</th>
                    <th>ACTIONS</th>
                </tr>

                <?php
                    $sql = "SELECT * FROM admin";
                    $res = mysqli_query($conn, $sql);

                    if($res==TRUE)
                    {
                        $count = mysqli_num_rows($res); //Get rows
                        $sn = 1;
                        if($count>0)
                        {
                            while($rows = mysqli_fetch_assoc($res))
                            {
                                $id = $rows['admin_id'];
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
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>"><button class="btngreen">UPDATE</button></a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>"><button class="btnred">DELETE</button></a>
                                            <a href="<?php echo SITEURL; ?>admin/change-password.php?id=<?php echo $id; ?>"><button class="btninfo">CHANGE PASSWORD</button></a>
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
    </div>
    <!--main content section end-->