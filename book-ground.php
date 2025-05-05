<?php include('./partials/menu.php'); ?>
        <div class="title">
            <h1 class="main-title">Booking Ground</h1>
        </div>
    </div>
    <br>
    <center>
        <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>
    </center>
    <br><br>
    <div class="center">
        <div class="booking">
            <?php
                $id = $_GET['id'];
            
                $sql = "SELECT * FROM ground WHERE gro_id=$id";
                $res = mysqli_query($conn, $sql);
                if($res==TRUE)
                {
                    $count = mysqli_num_rows($res);
                    if($count==1)
                    {
                        $rows = mysqli_fetch_assoc($res);
                        $name = $rows['ground_name'];
                        $description = $rows['description'];
                        $price = $rows['price'];
                        $place = $rows['place'];
                        $image = $rows['picture'];
                    }
                }
            ?>
            <img src="<?php echo SITEURL; ?>admin/assets/grounds/<?php echo $image; ?>">
            <div class="name">
                <b>Name : </b><?php echo $name; ?>
            </div>   
            <div class="description">
                <b>Description : </b><?php echo $description; ?>
            </div>
            <div class="price">
                <b>Price : </b><?php echo $price; ?>
            </div>
            <div class="price">
                <b>Place : </b><?php echo $place; ?>
            </div>
            <div class="submit">
                <input type="submit" value="Book Ground" class="btngreen" onclick="openForm()" name="next">

                <!-- Overlay -->
                <div class="overlay" id="overlay" onclick="closeForm()"></div>

                <!-- Popup Form -->
                <div class="popup-form" id="popupForm">
                    <h2>Enter Dates</h2>
                    <br>
                    <!-- <form method="post">
                        <b>Start Date:</b><input type="date" name="sdate" required class="after-date">
                        <b>End Date:</b><input type="date" name="edate" required class="after-date">

                        <a href="<?php echo SITEURL; ?>booking-details.php?id=<?php echo $id; ?>">
                            <button type="submit" name="submit" class="btngreen" style="width: 80%;">Submit</button>
                        </a>
                        <button class="btnred" onclick="closeForm()" style="width: 80%;">Cancle</button>
                    </form> -->

                    <form method="post" onsubmit="return validateDates()">
    <b>Start Date:</b>
    <input type="date" name="sdate" id="sdate" required class="after-date" onchange="updateEndDateMin()">
    
    <b>End Date:</b>
    <input type="date" name="edate" id="edate" required class="after-date">

    <!-- Error message span -->
    <span id="error-message" style="color: tomato; display: none;">End date must be greater than start date.</span>

    <!-- Submit button inside the form -->
    <button type="submit" name="submit" class="btngreen" style="width: 80%;">Submit</button>
    
    <button type="button" class="btnred" onclick="closeForm()" style="width: 80%;">Cancel</button>
</form>

<script>
    // Set today's date as the minimum for both inputs on page load
    window.onload = function () {
        const today = new Date().toISOString().split('T')[0];
        document.getElementById("sdate").setAttribute("min", today);
        document.getElementById("edate").setAttribute("min", today);
    };

    // Update End Date's min attribute based on Start Date selection
    function updateEndDateMin() {
        const startDate = document.getElementById("sdate").value;
        document.getElementById("edate").setAttribute("min", startDate);
    }

    function validateDates() {
        const startDate = document.getElementById("sdate").value;
        const endDate = document.getElementById("edate").value;

        if (endDate < startDate) {
            document.getElementById("error-message").style.display = "inline";
            return false;
        }

        document.getElementById("error-message").style.display = "none";
        return true;
    }
</script>


                </div>
            </div>
        </div>
    </div><br><br><br><br>
<?php include('./partials/footer.php') ?>

<?php
    if(isset($_POST['submit']))
    {
        $sdate = $_POST['sdate'];
        $edate = $_POST['edate'];
        $id    = $_GET['id'];
        ?>
        <script>
            window.location.href = "booking-details.php?sdate=<?php echo $sdate; ?>&edate=<?php echo $edate; ?>&id=<?php echo $id; ?>";
        </script>
        <?php
    }
?>