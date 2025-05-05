<?php

include('../config/constants.php');

session_destroy(); //Unset $_SESSION['admin']

header('location:' .SITEURL.'index.php');

?>