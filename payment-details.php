<?php
    include('./partials/menu.php');
    include('./partials/login-check.php');

    $total = $_GET['total'];
    
?>
            <div class="title">
                <h1 class="main-title">Payment Details</h1>
            </div>
        </div>
        <br>
        <div class="center">
            <div class="payment">
                <center>
                <form method="post">
                    <table width="700px">
                        <tr>
                            <td width="250px"><b>Payment Method : </b></td>
                            <td width="350px" align="left">
                                <input type="radio" name="payment_method" class="payment-radio" value="Card" checked onclick="togglePaymentMethod()">Credit/Debit Card
                                <input type="radio" name="payment_method" class="payment-radio" value="UPI" onclick="togglePaymentMethod()">UPI
                            </td>
                        </tr>
                    </table>
                    <div id="card-details">
                        <table width="700px">
                            <tr>
                                <td width="250px"><b>Name on Card : </b></td>
                                <td width="350px">
                                    <input type="text" name="name" placeholder="John Doe" required class="payment-input">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Card Number : </b></td>
                                <td>
                                    <input type="text" name="card_number" placeholder="1234 5678 9012 3456" required class="payment-input">
                                </td>
                            </tr>
                            <tr>
                                <td><b>Expiry Date : </b></td>
                                <td>
                                    <input type="text" name="expiry" placeholder="MM/YY" required class="payment-input">
                                </td>
                            </tr>
                            <tr>
                                <td><b>CVV : </b></td>
                                <td>
                                    <input type="text" name="cvv" placeholder="123" required class="payment-input">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id="upi-details" class="hidden">
                        <table width="700px">
                            <tr>
                                <td width="250px"><b>UPI ID : </b></td>
                                <td width="350px">
                                    <input type="text" name="upi_id" placeholder="example@upi" required class="payment-input">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <input type="submit" class="btn-submit" name="submit" value="Pay <?php echo $total; ?>">   
                </form>
                </center>
            </div>
        </div>
</div><br><br><br>
<?php include('./partials/footer.php'); ?>

<?php
    if(isset($_POST['submit']))
    {
        $b_id = $_GET['bid'];
        $amount = $total;
        $payment_method = $_POST['payment_method'];
        $username = $_SESSION['user'];
        if($payment_method == "Card")
        {
            $card_name = $_POST['name'];
            $card_number = $_POST['card_number'];
            $expiry = $_POST['expiry'];
            $cvv = $_POST['cvv'];

            $sql = "INSERT INTO payment set b_id=$b_id, payment_method='$payment_method', card_name='$card_name', card_number='$card_number', expiry_date='$expiry', cvv='$cvv', amount=$amount";
            $res = mysqli_query($conn, $sql);
            $b_id = mysqli_insert_id($conn);
            if($res==true)
            {
                ?>
                <script>
                    window.location.href = "./booking-list.php?username=<?php echo $username; ?>";
                </script>
                <?php
            }   
        }
        else
        {
            $upi = $_POST['upi_id'];

            $sql2 = "INSERT INTO payment set b_id=$b_id, payment_method='$payment_method', upi_id='$upi', amount=$amount";
            $res2 = mysqli_query($conn, $sql2);
            $b_id = mysqli_insert_id($conn);
            if($res2==true)
            {
                ?>
                <script>
                    window.location.href = "./booking-list.php?username=<?php echo $username; ?>";
                </script>
                <?php
            }
        }
    }
?>