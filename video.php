<?php
session_start();
$title = 'Videos';
$section = 'video';
include 'header.php';?>


<video width="400" controls autoplay>
    <source src="loadTesting.php" type="video/mp4">
</video>

<?php include 'footer.php'?>

