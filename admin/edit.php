<?php
/**
 * Created by PhpStorm.
 * User: GHostEater
 * Date: 26-Feb-16
 * Time: 11:42 AM
 */
function EditAdmin(){
    include("../conn.php");

    $id = mysqli_real_escape_string($con,$_GET['id']);
    $username = mysqli_real_escape_string($con,$_GET['username']);
    $password = mysqli_real_escape_string($con,$_GET['password']);
    $name = mysqli_real_escape_string($con,$_GET['name']);

    $query = "UPDATE admin SET username='$username',password=aes_encrypt('$password','7037286040'),
    name='$name' where id = '$id'";
    mysqli_query($con,$query)or die("Unable To Execute");

    header("HTTP/1.0 201 Success");
}