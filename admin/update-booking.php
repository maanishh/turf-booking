<?php include('./partials/menu.php'); ?>


<?php

// Add the PHPMailer requires and use statements at the top of the file
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

?>

    <div class="main">
        <p class="main-heading">UPDATE BOOKING</p>
        <br><br>
        <?php
            $id = $_GET['id'];  //Get id
            $sql = "SELECT * FROM booking WHERE b_id=$id";   //SQL query
            $res = mysqli_query($conn, $sql);   //Execute the query
            if($res==TRUE)
            {
               $count = mysqli_num_rows($res);
               if($count==1)
               {
                    $rows = mysqli_fetch_assoc($res);

                    $id = $rows['b_id'];
                    $gname = $rows['ground_name'];
                    $category = $rows['category'];
                    $sdate = $rows['start_date'];
                    $edate = $rows['end_date'];
                    $price = $rows['price'];
                    $total = $rows['total'];
                    $status = $rows['status'];
                    $reg_id = $rows['reg_id'];
                    
                    $sql2 = "SELECT * FROM registration WHERE reg_id=$reg_id";
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
                }
            }
        ?>
        <div class="container">
            <div class="sub-container">
                <p class="form-heading">Booking Details</p>
                <hr class="h-line">
                <form method="post">
                    <b><u>Ground Details</u></b><br><br>
                    <p>Ground Name : <?php echo $gname; ?></p><br>
                    <p>Ground Category : <?php echo $category; ?></p><br>
                    <p>Ground Price : <?php echo $price; ?></p><br>
                    <p>Start Date : <?php echo $sdate; ?></p><br>
                    <p>End Date : <?php echo $edate; ?></p><br>
                    <p>Total Amount : <?php echo $total; ?></p><br>
                    <b><u>User Details</u></b><br><br>
                    <p>Username : <?php echo $username; ?></p><br>
                    <p>Contact : <?php echo $contact; ?></p><br>
                    <p>Email : <?php echo $email; ?></p><br>
                    <p>Status : </p>
                    <div class="tbl-align">
                        <?php
                            if($status == "Pending")
                            {
                                ?>
                                    <input type="radio" name="status" value="Pending" checked>Pending
                                    <input type="radio" name="status" value="Completed">Completed
                                    <input type="radio" name="status" value="Failed">Failed
                                <?php
                            }
                            if($status == "Completed")
                            {
                                ?>

                                    <input type="radio" name="status" value="Pending" >Pending
                                    <input type="radio" name="status" value="Completed" checked>Completed
                                    <input type="radio" name="status" value="Failed">Failed
                                <?php
                            }
                            if($status == "Failed")
                            {
                                ?>
                                    <input type="radio" name="status" value="Pending">Pending
                                    <input type="radio" name="status" value="Completed">Completed
                                    <input type="radio" name="status" value="Failed" checked>Failed
                                <?php
                            }

                        ?> 
                        <input type="hidden" name="email_id" value="<?php echo $email; ?>" >
                        <input type="hidden" name="username" value="<?php echo $username; ?>" >
                    </div>
                    <button name="submit" class="btn-submit">UPDATE BOOKING</button>
                </form>
            </div>
        </div>
    </div>

    <?php
if(isset($_POST['submit']))
{

    //Get data from form
    $status = $_POST['status'];

    //SQL query for store data
    $sql3 = "UPDATE booking SET status='$status' WHERE b_id=$id";

    //Executing query and store data into database
    $res3 = mysqli_query($conn, $sql3) or die(mysqli_error());

    //Data inserted or not
    if($res3==TRUE)
    {
///manish chnages 09
        if($status == 'Completed'){
           

// Now your mail logic
$mail = new PHPMailer(true);

try {
    // SMTP Settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'manishlakum4871@gmail.com';          
    $mail->Password   = 'ptks lbpf tcpt hgrf';  // App password only
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Sender and Recipient
    $mail->setFrom('manishlakum4871@gmail.com', 'truf booking system');
    $mail->addAddress($_POST['email_id'], $_POST['username']);

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Booking Completed';
    $mail->Body    = '<b>Hello!</b> Your booking is completed.';
    $mail->AltBody = 'Hello! Your booking is completed.';

    $mail->send();
    echo '✅ Email sent successfully!';
} catch (Exception $e) {
    echo "❌ Message could not be sent. Error: {$mail->ErrorInfo}";
}
       
        }

        $_SESSION['update-booking'] = "<div class='success'>Booking Updated Successfully</div>";
        header("location:".SITEURL.'admin/manage-booking.php');
    }
    else
    {
        $_SESSION['update-booking'] = "<div class='error'>Failed To Update Booking</div>";
        header("location:".SITEURL.'admin/manage-booking.php');
    }
}
?>