<?php
/**
 * Created by PhpStorm.
 * User: GHostEater
 * Date: 26-Feb-16
 * Time: 11:41 AM
 */
function DeleteUser(){
    include("../conn.php");

    $id = mysqli_real_escape_string($con,$_GET['id']);
    $query = "DELETE FROM user WHERE id = '$id'";
    mysqli_query($con,$query)or die("Unable To Execute");

    header("HTTP/1.0 201 Success");
}