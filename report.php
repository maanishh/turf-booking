<?php 
    include('./partials/menu.php');
    $b_id = $_GET['bid'];

    $sql = "SELECT * FROM booking WHERE b_id=$b_id";   //SQL query
    $res = mysqli_query($conn, $sql);   //Execute the query
    if($res==TRUE)
    {
       $count = mysqli_num_rows($res);
       if($count==1)
       {
            $rows = mysqli_fetch_assoc($res);
            
            $gname = $rows['ground_name'];
            $sdate = $rows['start_date'];
            $edate = $rows['end_date'];
            $category = $rows['category'];
            $price = $rows['price'];
            $total = $rows['total'];
            $status = $rows['status'];
            $reg_id = $rows['reg_id'];

            $sdate = date_create($sdate);
            $edate = date_create($edate);
            $days = date_diff($sdate, $edate) -> days;

            $sdate = $rows['start_date'];
            $edate = $rows['end_date'];
        }
    }

    $sql2 = "SELECT * FROM registration WHERE reg_id=$reg_id";   //SQL query
    $res2 = mysqli_query($conn, $sql2);   //Execute the query
    if($res2==TRUE)
    {
       $count2 = mysqli_num_rows($res2);
       if($count2==1)
       {
            $rows2 = mysqli_fetch_assoc($res2);

            $username = $rows2['username'];
            $contact = $rows2['contact'];
            $email = $rows2['email'];
       }
    }

    $sql3 = "SELECT * FROM payment WHERE b_id=$b_id";   //SQL query
    $res3 = mysqli_query($conn, $sql3);   //Execute the query
    if($res3==TRUE)
    {
       $count3 = mysqli_num_rows($res3);
       if($count3==1)
       {
            $rows3 = mysqli_fetch_assoc($res3);

            $payment_method = $rows3['payment_method'];
            $cname = $rows3['card_name'];
            $cnumber = $rows3['card_number'];
            $expiry = $rows3['expiry_date'];
            $cvv = $rows3['cvv'];
            $upi = $rows3['upi_id'];
            $payment_date = $rows3['payment_date'];
       }
    }
?>
            <div class="title">
                <h1 class="main-title">Report</h1>
                <!-- <hr class="h-line">
                <h3>Your Game, Your Time – Book The Perfect Sports Ground Now!</h3> -->
            </div>
        </div>
        <br><br><br>
        <div class="center">
            <div class="booking-details">
            <form method="post"> 
                <center>
                <h2><u>Booking Details</u></h2><br>
                    <table width="90%">
                        <tr>
                            <td>Ground Name : </td>
                            <td><?php echo $gname; ?></td>
                        </tr>
                        <tr>
                            <td>Ground Category : </td>
                            <td><?php echo $category; ?></td>
                        </tr>
                        <tr>
                            <td>Ground Price : </td>
                            <td><?php echo $price; ?>/Day</td>
                        </tr>
                        <tr>
                            <td>Start Date : </td>
                            <td><?php echo $sdate; ?></td>
                        </tr>
                        <tr>
                            <td>End Date : </td>
                            <td><?php echo $edate; ?></td>
                        </tr>
                        <tr>
                            <td>Total Days : </td>
                            <td><?php echo $days; ?></td>
                        </tr>
                    </table>
                </center>
                <br><br>
                <center>
                <h2><u>User Details</u></h2><br>
                    <table width="90%">
                        <tr>
                            <td>Username : </td>
                            <td><?php echo $username; ?></td>
                        </tr>
                        <tr>
                            <td>Contact : </td>
                            <td><?php echo $contact; ?></td>
                        </tr>
                        <tr>
                            <td>Email : </td>
                            <td><?php echo $email; ?>/Day</td>
                        </tr>
                    </table>
                </center>
                <br><br>
                <center>
                <h2><u>Payment Details</u></h2><br> 
                    <?php
                        if($payment_method == "Card")
                        {
                            ?>
                                <table width="90%">
                                    <tr>
                                        <td>Payment Method : </td>
                                        <td><?php echo $payment_method; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Card Name : </td>
                                        <td><?php echo $cname; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Card Number : </td>
                                        <td><?php echo $cnumber; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Expiry Date : </td>
                                        <td><?php echo $expiry; ?></td>
                                    </tr>
                                    <tr>
                                        <td>CVV : </td>
                                        <td><?php echo $cvv; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Payment Date : </td>
                                        <td><?php echo $payment_date; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total Amount : </td>
                                        <td><?php echo $total; ?>.00</td>
                                    </tr>
                                </table>
                            <?php
                        }
                        if($payment_method == "UPI")
                        {
                            ?>
                                <table width="90%">
                                    <tr>
                                        <td>Payment Method : </td>
                                        <td><?php echo $payment_method; ?></td>
                                    </tr>
                                    <tr>
                                        <td>UPI ID : </td>
                                        <td><?php echo $upi; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Payment Date : </td>
                                        <td><?php echo $payment_date; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Total Amount : </td>
                                        <td><?php echo $total; ?>.00</td>
                                    </tr>
                                </table>
                            <?php
                        }
                    ?> 
                </center>

                <center>
                    <a href="<?php echo SITEURL .'booking-list.php?username='. $username; ?>">
                        BACK
                    </a>
                </center>
            </div>
        </div><br><br><br>
    </div>
<?php include('./partials/footer.php') ?>