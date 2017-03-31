<?php
/**
 * Created by PhpStorm.
 * User: GHostEater
 * Date: 26-Feb-16
 * Time: 11:37 AM
 */
function AddSuperAdmin(){
    include('../conn.php');
    $username = mysqli_real_escape_string($con,$_GET['username']);
    $password = mysqli_real_escape_string($con,$_GET['password']);
    $name = mysqli_real_escape_string($con,$_GET['name']);
    $acctNum = mysqli_real_escape_string($con,$_GET['acctNum']);
    $acctName = mysqli_real_escape_string($con,$_GET['acctName']);
    $bank = mysqli_real_escape_string($con,$_GET['bank']);
    $phone = mysqli_real_escape_string($con,$_GET['phone']);

    $query = "insert into superadmin(id,name,username,password,acctNum,acctName,bank,phone)
    VALUES(NULL,'$name','$username',aes_encrypt('$password','7037286040'),'$acctNum','$acctName','$bank','$phone')";
    mysqli_query($con,$query)or die("Unable To Execute");

    header("HTTP/1.0 201 Success");
}