<?php
session_start();
session_destroy();
header("location:../index.php?msg= You Have Successfully Logged Out!");
?>
