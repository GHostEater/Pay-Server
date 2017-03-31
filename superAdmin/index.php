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
require("superAdmins.php");

$option = mysqli_real_escape_string($con,$_GET['option']);

if($option == ''){
    SuperAdmins();
}
else if($option == 'post'){
    AddSuperAdmin();
}
else if($option == 'put'){
    EditSuperAdmin();
}
else if($option == 'delete'){
    DeleteSuperAdmin();
}
ob_end_flush();