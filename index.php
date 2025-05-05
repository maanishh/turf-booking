<?php include('./partials/menu.php'); ?>
            <div class="title">
                <h1 class="main-title">Sports Complex Booking System</h1>
                <hr class="h-line">
                <h3>Your Game, Your Time – Book The Perfect Sports Ground Now!</h3>
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
        <br>
        <br>
        <div class="center">
            <div class="sub-welcome">
                <h1>Welcome</h1>
                <hr class="h-line"><br>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome to Turf Booking System, the ultimate destination for
                    hassle-free sports ground bookings! We understand how important it is to have access to the right
                    facilities for your game, practice, or event. That’s why we’ve created a simple, easy-to-use
                    platform where you can find and book a wide range of sports grounds.<br><br>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Our mission is to make your booking experience as seamless as
                    possible. With just a few clicks, you
                    can reserve the perfect space for your next match, training session, or casual play. Whether you're
                    a professional athlete, a casual player, or organizing a community event, we have the right venue to
                    suit your needs.<br><br>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;At Turf Booking System, we believe in providing not just the best
                    facilities, but also flexibility,
                    convenience, and outstanding customer service. You can browse availability, choose your preferred
                    time slots, and book your ground at competitive prices.<br><br>

                <h4>Why choose online truf booking system?</h4><br>
                <li><b>Easy Booking: </b>Browse, select, and book your preferred turf in just a few clicks.</li>
                <li><b>Wide Range of Turfs: </b>From urban box cricket arenas to beachside volleyball courts, we offer
                    diverse options to suit every player's needs.</li>
                <li><b>Transparent Pricing: </b>Know the cost upfront with no hidden fees or charges.</li>
                <li><b>Secure Payment: </b>Enjoy peace of mind with our secure and reliable payment system.</li>
                <li><b>Additional Services: </b>From equipment rentals to coaching services, we've got everything you
                    need for a fantastic sports experience.</li>
                <li><b>Exceptional Customer Service: </b>Our dedicated team is always ready to assist you with any
                    inquiries or special requests.</li><br>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ready to play? Book your sports ground with ease on Turf Booking System! Whether you're planning a
                competitive match, a friendly game, or a practice session, our platform makes it simple to reserve the
                perfect venue. Browse our selection of well-maintained sports grounds, choose your preferred time, and
                book in just a few clicks. Don’t wait – secure your spot today and get ready to elevate your game!
                </p>
            </div>
        </div>
        <br><br>
        <div class="center">
            <div class="ground">
                <?php

                    $sql = "SELECT * FROM ground WHERE status='Active' LIMIT 4";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);

                    if($count>0)
                    {
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            $id = $rows['gro_id'];
                            $name = $rows['ground_name'];
                            $image = $rows['picture'];
                            $description = $rows['description'];


                            $cat_id = $rows['cat_id'];
                            $sql2 = "SELECT * FROM category WHERE cat_id='$cat_id'";
                            $res2 = mysqli_query($conn, $sql2);
                            $rows2 = mysqli_fetch_assoc($res2);

                            $category = $rows2['name'];
                            ?>
                            <a href="./book-ground.php?id=<?php echo $id; ?>" style="text-decoration: none; color: black;">
                            <div class="ground-item">
                                <div class="ground-sub-item"><img src="<?php echo SITEURL ?>admin/assets/grounds/<?php echo $image ?>"></div>
                                <div class="ground-sub-item"><h2><?php echo $name; ?></h2></div>
                                <div class="ground-sub-item"><h3><?php echo $category; ?></h3></div>
                                <div class="ground-sub-item"><p><?php echo $description; ?></p></div>
                            </div></a>
                            <?php
                        }                 
                    }
                ?>
            </div>
        </div><br><br>
        <center><a href="ground.php">View More Grounds...</a></center>
        <br><br><br>
    </div>
    <?php include('./partials/footer.php') ?>
    <script src="script.js"></script>
</body>

</html>