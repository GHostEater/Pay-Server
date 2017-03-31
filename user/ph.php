<?php
/**
 * Created by PhpStorm.
 * User: GHostEater
 * Date: 31-Jan-17
 * Time: 9:01 AM
 */
function Ph(){
    include('../conn.php');

    $id = mysqli_real_escape_string($con,$_GET['id']);
    $amount = mysqli_real_escape_string($con,$_GET['amount']);


    $query = "insert into pairing(id,giverId,giverAmount,status,superStat)
              VALUES(null,'$id','$amount','0','0')";
    mysqli_query($con,$query)or die("Unable To Execute");

    header("HTTP/1.0 201 Success");
}