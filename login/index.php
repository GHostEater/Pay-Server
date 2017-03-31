<?php
/**
 * Created by PhpStorm.
 * User: GHostEater
 * Date: 26-Jan-17
 * Time: 6:50 PM
 */
ob_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require("../conn.php");
require("superLogin.php");
require("adminLogin.php");
require("userLogin.php");

$option = mysqli_real_escape_string($con,$_GET['option']);

if($option == 'super'){
    SuperLogin();
}
else if($option == 'admin'){
    AdminLogin();
}
else if($option == 'user'){
    UserLogin();
}
ob_end_flush();