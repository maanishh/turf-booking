<?php include('./partials/menu.php'); ?>

    <!--main content section start-->
    <div class="main">
        <p class="main-heading">MANAGE CATEGORY</p>

        <?php

            if(isset($_SESSION['add-category']))
            {
                echo $_SESSION['add-category'];
                unset($_SESSION['add-category']);
            }
            if(isset($_SESSION['update-category']))
            {
                echo $_SESSION['update-category'];
                unset($_SESSION['update-category']);
            }
            if(isset($_SESSION['delete-categroy']))
            {
                echo $_SESSION['delete-categroy'];
                unset($_SESSION['delete-categroy']);
            }

        ?>

        <br><br>
        <a href="./add-category.php"><button class="btnblue">ADD CATEGORY</button></a>
        <br><br><br>
        <div class="tbl-align">
            <table class="admintbl">
                <tr>
                    <th>S.N.</th>
                    <th>CATEGORY NAME</th>
                    <th>STATUS</th>
                    <th>ACTIONS</th>
                </tr>

                <?php
                    $sql = "SELECT * FROM category";
                    $res = mysqli_query($conn, $sql);

                    if($res==TRUE)
                    {
                        $count = mysqli_num_rows($res); //Get number of rows
                        $sn = 1;
                        if($count>0)
                        {
                            while($rows = mysqli_fetch_assoc($res))
                            {
                                $id = $rows['cat_id'];
                                $name = $rows['name'];
                                $status = $rows['status'];

                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $name; ?></td>
                                    
                                    <td><?php echo $status; ?></td>
                                    <td>
                                        <div class="tbl-align">
                                            <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>"><button class="btngreen">UPDATE</button></a>
                                            <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>"><button class="btnred">DELETE</button></a>
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
                                <td colspan="4"><center>No Categories Available In Database.</center></td>
                            </tr>
                            <?php
                        }
                        
                    }

                ?>
            </table>
        </div>
    </div>
    <!--main content section end-->