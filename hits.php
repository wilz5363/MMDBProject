<?php
$title = 'Hits';
$section = 'hit';
include 'head.php';

$category = $_GET['category'];

if($category == 'song'){
    include "hit_song.php";
}elseif($category == 'video'){
    include "hit_video.php";
}

include "footer.php";