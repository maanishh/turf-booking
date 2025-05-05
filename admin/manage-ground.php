<?php include('./partials/menu.php'); ?>

    <!--main content section start-->
    <div class="main">
        <p class="main-heading">MANAGE GROUNDS</p>

        <?php

            if(isset($_SESSION['add-ground']))
            {
                echo $_SESSION['add-ground'];
                unset($_SESSION['add-ground']);
            }
            if(isset($_SESSION['update-ground']))
            {
                echo $_SESSION['update-ground'];
                unset($_SESSION['update-ground']);
            }
            if(isset($_SESSION['delete-ground']))
            {
                echo $_SESSION['delete-ground'];
                unset($_SESSION['delete-ground']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

        ?>

        <br><br>
        <a href="./add-ground.php"><button class="btnblue">ADD GROUND</button></a>
        <br><br><br>
        <div class="tbl-align">
            <table class="admintbl">
                <tr>
                    <th>S.N.</th>
                    <th>GROUND NAME</th>
                    <th>PICTURE</th>
                    <th>PRICE</th>
                    <th>STATUS</th>
                    <th>ACTIONS</th>
                </tr>

                <?php
                    $sql = "SELECT * FROM ground";
                    $res = mysqli_query($conn, $sql);

                    if($res==TRUE)
                    {
                        $count = mysqli_num_rows($res); //Get number of rows
                        $sn = 1;
                        if($count>0)
                        {
                            while($rows = mysqli_fetch_assoc($res))
                            {
                                $id = $rows['gro_id'];
                                $name = $rows['ground_name'];
                                $status = $rows['status'];
                                $image = $rows['picture'];
                                $price = $rows['price'];

                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><img src="<?php echo SITEURL; ?>admin/assets/grounds/<?php echo $image; ?>" width="150px"></td>
                                    <td><?php echo $price; ?></td>
                                    <td><?php echo $status; ?></td>
                                    <td>
                                        <div class="tbl-align">
                                            <a href="<?php echo SITEURL; ?>admin/update-ground.php?id=<?php echo $id; ?>"><button class="btngreen">UPDATE</button></a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-ground.php?id=<?php echo $id; ?>&image=<?php echo $image; ?>"><button class="btnred">DELETE</button></a>
                                            <a href="<?php echo SITEURL; ?>admin/info-ground.php?id=<?php echo $id; ?>"><button class="btninfo">GROUND INFO</button></a>
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
                                <td colspan="6"><center>No Grounds Available In Database.</center></td>
                            </tr>
                            <?php
                        }
                        
                    }

                ?>
            </table>
        </div>
    </div>
    <!--main content section end-->