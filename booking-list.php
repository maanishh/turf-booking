<?php
    include('./partials/menu.php');
    include('./partials/login-check.php');

    $username = $_GET['username'];
    $sql = "SELECT * FROM registration WHERE username='$username'";
    $res = mysqli_query($conn, $sql);
    if($res==true)
    {
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            $rows = mysqli_fetch_assoc($res);

            $reg_id = $rows['reg_id'];
        }
    }
?>
            <div class="title">
                <h1 class="main-title">My Bookings</h1>
                <!-- <hr class="h-line">
                <h3>Your Game, Your Time – Book The Perfect Sports Ground Now!</h3> -->
            </div>
        </div>
        <br><br><br>
        <div class="center">
            <div class="ground">
                <table class="booking-tbl">
                    <tr>
                        <th>S.N.</th>
                        <th>Ground Name</th>
                        <th>Schedule</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                        
                    </tr>
                    <?php
                        $sn = 1;

                        $sql2 = "SELECT * FROM booking WHERE reg_id=$reg_id";
                        $res2 = mysqli_query($conn, $sql2);
                        $count2 = mysqli_num_rows($res2);
                        
                        if($count2>0)
                        {
                            while($rows2=mysqli_fetch_assoc($res2))
                            {
                                $b_id = $rows2['b_id'];
                                $gname = $rows2['ground_name'];
                                $category = $rows2['category'];
                                $sdate = $rows2['start_date'];
                                $edate = $rows2['end_date'];
                                $price = $rows2['price'];
                                $total = $rows2['total'];
                                $status = $rows2['status'];
                                ?>
                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $gname; ?></td>
                                        <td><?php echo $sdate." To ".$edate; ?></td>
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
                                            <a href="<?php echo SITEURL ?>report.php?bid=<?php echo $b_id; ?>"><button class="btngreen">View</button></a>
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
        </div>
    </div>
    <br><br><br>
<?php include('./partials/footer.php') ?>