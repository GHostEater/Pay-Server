<?php
/**
 * Created by PhpStorm.
 * User: GHostEater
 * Date: 26-Feb-16
 * Time: 11:42 AM
 */
function EditUser(){
    include("../conn.php");

    $id = mysqli_real_escape_string($con,$_GET['id']);
    $name = mysqli_real_escape_string($con,$_GET['name']);
    $username = mysqli_real_escape_string($con,$_GET['username']);
    $password = mysqli_real_escape_string($con,$_GET['password']);
    $email = mysqli_real_escape_string($con,$_GET['email']);
    $sex = mysqli_real_escape_string($con,$_GET['sex']);
    $dateBirth = date('Y-m-d',strtotime(mysqli_real_escape_string($con,$_GET['dateBirth'])));
    $state = mysqli_real_escape_string($con,$_GET['state']);
    $city = mysqli_real_escape_string($con,$_GET['city']);
    $acctNum = mysqli_real_escape_string($con,$_GET['acctNum']);
    $acctName = mysqli_real_escape_string($con,$_GET['acctName']);
    $bank = mysqli_real_escape_string($con,$_GET['bank']);
    $phone = mysqli_real_escape_string($con,$_GET['phone']);
    $balance = mysqli_real_escape_string($con,$_GET['balance']);

    $query = "UPDATE user SET username='$username',password=aes_encrypt('$password','7037286040'),
    name='$name',email='$email',sex='$sex',dateBirth='$dateBirth',state='$state',city='$city',
    acctNum='$acctNum',acctName='$acctName',bank='$bank',phone='$phone',balance='$balance' where id = '$id'";
    mysqli_query($con,$query)or die("Unable To Execute");

    header("HTTP/1.0 201 Success");
}