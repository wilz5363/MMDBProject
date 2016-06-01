<?php
/**
 * Created by PhpStorm.
 * User: Wilson
 * Date: 6/1/2016
 * Time: 5:49 AM
 */
session_start();
if(isset($_SESSION['user'])){
    session_destroy();
}
header("location: index.php");