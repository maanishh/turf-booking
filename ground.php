<?php include('./partials/menu.php'); ?>
            <div class="title">
                <h1 class="main-title">Grounds</h1>
                <!-- <hr class="h-line">
                <h3>Your Game, Your Time – Book The Perfect Sports Ground Now!</h3> -->
            </div>
        </div>
        <br><br><br>
        <div class="center">
            <div class="ground">
                <?php
                    $sql = "SELECT * FROM ground WHERE status='Active'";
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
        </div>
    </div>
    <?php include('./partials/footer.php') ?>
    <script src="script.js"></script>
</body>
</html>