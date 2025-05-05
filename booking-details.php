<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php
    include('./partials/menu.php');
    include('./partials/login-check.php');
    

    $id = $_GET['id'];
    $sdate = date_create($_GET['sdate']);
    $edate = date_create($_GET['edate']);
    
    $sql = "SELECT * FROM ground WHERE gro_id='$id'";
    $res = mysqli_query($conn, $sql);
    if($res==true)
    {
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            $rows = mysqli_fetch_assoc($res);

            $gname = $rows['ground_name'];
            $price = $rows['price'];
            $cat_id = $rows['cat_id'];
        }
    }

    $days = date_diff($sdate, $edate) -> days;
    $total = $price * $days;
    $today = date("Y-m-d");
    $g_id    = $_GET['id'];

    $sdate = $_GET['sdate'];
    $edate = $_GET['edate'];

    $sql2 = "SELECT * FROM category WHERE cat_id=$cat_id";
    $res2 = mysqli_query($conn, $sql2);
    if($res2==true)
    {
        $count2 = mysqli_num_rows($res2);
        if($count2==1)
        {
            $rows2 = mysqli_fetch_assoc($res2);
            $category = $rows2['name'];
        }
    }
    $username = $_SESSION['user'];
    $sql3 = "SELECT * FROM registration WHERE username='$username'";
    $res3 = mysqli_query($conn, $sql3);
    if($res3==true)
    {
        // $count3 = mysqli_num_rows($res3);
        $rows3 = mysqli_fetch_assoc($res3);
        $reg_id = $rows3['reg_id'];
        $username = $rows3['username'];
        $contact = $rows3['contact'];
        $email = $rows3['email'];
    }
?>
            <div class="title">
                <h1 class="main-title">Booking Details</h1>
            </div>
        </div>
        <br>
        <div id='err' style ="text-align: center;"></div>
        <div class="center">
            <div class="booking-details">
                <form method="post">
                    <center>
                    <table width="70%">
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
                            <td width="250px">Total Days : </td>
                            <td width="250px"><?php echo $days; ?></td>
                        </tr>
                        <tr>
                            <td width="250px">Total Amount : </td>
                            <td width="250px"><?php echo $total; ?></td>
                        </tr>
                        <tr>
                            <td width="250px">Date : </td>
                            <td width="250px"><?php echo $today; ?></td>
                        </tr>
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
                            <td><?php echo $email; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" name="submit" value="Confirm Booking" class="btngreen">
                            </td>
                        </tr>
                    </table></center>
                </form>
            </div>
        </div>
</div><br><br><br>
<?php include('./partials/footer.php'); ?>
<?php
    if(isset($_POST['submit']))
    {

        $sql_check="SELECT *
        FROM booking
        WHERE g_id = $id
        AND status = 'Completed'
        AND (
        (start_date <= '$sdate' AND end_date >= '$edate') OR (start_date >= '$sdate' AND end_date <= '$edate')
        );";

        $res = mysqli_query($conn, $sql_check);
        if($res==TRUE)
        {
            $count = mysqli_num_rows($res);
            if($count >= 1)
            { ?>
           <script>
          //  setInterval(function() {
                $("#err").html('<span style="color:red;">Ground already booked.</span>');
            //    }, 1000); // 1000 milliseconds = 1 second
            </script>


            <?php
              
            }else{

                $sql4 = "INSERT INTO booking set ground_name='$gname', start_date='$sdate', g_id='$g_id', end_date='$edate', category='$category', price='$price', total=$total, reg_id=$reg_id";
                $res4 = mysqli_query($conn, $sql4);
                $b_id = mysqli_insert_id($conn);
                if($res4==true)
                {
                    ?>
                    <script>
                        window.location.href = "payment-details.php?total=<?php echo $total; ?>&bid=<?php echo $b_id; ?>";
                    </script>
                    <?php
                }

            }
        }

       
    }
?>