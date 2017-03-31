<?php
/**
 * Created by PhpStorm.
 * User: GHostEater
 * Date: 26-Feb-16
 * Time: 11:37 AM
 */
function AddAdmin(){
    include('../conn.php');
    $username = mysqli_real_escape_string($con,$_GET['username']);
    $password = mysqli_real_escape_string($con,$_GET['password']);
    $name = mysqli_real_escape_string($con,$_GET['name']);

    $query = "insert into admin(id,name,username,password)
    VALUES(NULL,'$name','$username',aes_encrypt('$password','7037286040'))";
    mysqli_query($con,$query)or die("Unable To Execute");

    header("HTTP/1.0 201 Success");
}