<?php include('./partials/menu.php'); ?>

    <div class="main">
        <p class="main-heading">MANAGE BOOKING</p>
        <?php
            if(isset($_SESSION['update-booking']))
            {
                echo $_SESSION['update-booking'];
                unset($_SESSION['update-booking']);
            }
        ?>
        <br><br>
        <div class="tbl-align">
            <table class="admintbl">
                <tr>
                    <th>S.N.</th>
                    <th>Ground Name</th>
                    <th>Schedule</th>
                    <th>Price</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <?php
                    $sn = 1;
                    $sql = "SELECT * FROM booking ORDER BY b_id DESC";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);        
                    if($count>0)
                    {
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            $id = $rows['b_id'];
                            $gname = $rows['ground_name'];
                            // $category = $rows['category'];
                            $sdate = $rows['start_date'];
                            $edate = $rows['end_date'];
                            $price = $rows['price'];
                            $total = $rows['total'];
                            $status = $rows['status'];
                            ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $gname; ?></td>
                                    <td><?php echo $sdate." To ".$edate; ?></td>
                                    <td><?php echo $price; ?></td>
                                    <td><?php echo $total; ?></td>
                                    <td>
                                        <?php
                                            if($status=="Pending")
                                            {
                                                ?>
                                                    <div class="pending"><?php echo $status; ?></div>
                                                <?php
                                            }
                                            if($status=="Completed")
                                            {
                                                ?>
                                                    <div class="completed"><?php echo $status; ?></div>
                                                <?php
                                            }
                                            if($status=="Failed")
                                            {
                                                ?>
                                                    <div class="failed"><?php echo $status; ?></div>
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <div class="tbl-align">
                                            <a href="<?php echo SITEURL; ?>admin/update-booking.php?id=<?php echo $id; ?>"><button class="btngreen">UPDATE</button></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                            <tr height="150px">
                                
                                <td colspan="6"><center>No Booking Record Found</center></td>
                                
                            </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
        <br><br><br>
    </div>