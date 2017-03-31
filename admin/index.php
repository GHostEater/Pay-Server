<?php
/**
 * Created by PhpStorm.
 * User: GHostEater
 * Date: 26-Jan-17
 * Time: 6:01 PM
 */
ob_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require("../conn.php");
require("add.php");
require("edit.php");
require("delete.php");
require("admins.php");

$option = mysqli_real_escape_string($con,$_GET['option']);

if($option == ''){
    Admins();
}
else if($option == 'post'){
    AddAdmin();
}
else if($option == 'put'){
    EditAdmin();
}
else if($option == 'delete'){
    DeleteAdmin();
}
ob_end_flush();