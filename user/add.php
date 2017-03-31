<?php
/**
 * Created by PhpStorm.
 * User: GHostEater
 * Date: 26-Feb-16
 * Time: 11:37 AM
 */
function AddUser(){
    include('../conn.php');

    $name = mysqli_real_escape_string($con,$_GET['name']);
    $username = mysqli_real_escape_string($con,$_GET['username']);
    $password = mysqli_real_escape_string($con,$_GET['password']);
    $email = mysqli_real_escape_string($con,$_GET['email']);
    $sex = mysqli_real_escape_string($con,$_GET['sex']);
    $dateBirth = date('Y-m-d',strtotime($_GET['dateBirth']));
    $state = mysqli_real_escape_string($con,$_GET['state']);
    $city = mysqli_real_escape_string($con,$_GET['city']);
    $acctNum = mysqli_real_escape_string($con,$_GET['acctNum']);
    $acctName = mysqli_real_escape_string($con,$_GET['acctName']);
    $bank = mysqli_real_escape_string($con,$_GET['bank']);
    $phone = mysqli_real_escape_string($con,$_GET['phone']);

    $query = "select * from user WHERE gh = '0'";
    $result = mysqli_query($con,$query);
    $nRows = mysqli_num_rows($result);

    $query = "select * from user where gh = '1'";
    $result = mysqli_query($con,$query);
    $nRows2 = mysqli_num_rows($result);

    if($nRows > $nRows2){
        $gh = 1;
    }
    else if($nRows2 > $nRows){
        $gh = 0;
    }
    else{
        $gh = 0;
    }

    $query = "insert into user(id,name,username,password,email,sex,dateBirth,state,city,acctNum,acctName,
    bank,phone,balance,gh)
    VALUES(NULL,'$name','$username',aes_encrypt('$password','7037286040'),'$email','$sex','$dateBirth',
    '$state','$city','$acctNum','$acctName','$bank','$phone','0','$gh')";
    mysqli_query($con,$query)or die("Unable To Execute");

    header("HTTP/1.0 201 Success");
}