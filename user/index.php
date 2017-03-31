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
require("users.php");
require("gh.php");
require("ph.php");
require("confirm.php");
require("pairings.php");

$option = mysqli_real_escape_string($con,$_GET['option']);

if($option == ''){
    Users();
}
else if($option == 'post'){
    AddUser();
}
else if($option == 'put'){
    EditUser();
}
else if($option == 'delete'){
    DeleteUser();
}
else if($option == 'ph'){
    Ph();
}
else if($option == 'gh'){
    Gh();
}
else if($option == 'confirm'){
    confirm();
}
else if($option == 'pairings'){
    pairings();
}
ob_end_flush();