<?php
/**
 * Created by PhpStorm.
 * User: GHostEater
 * Date: 31-Jan-17
 * Time: 9:42 AM
 */
function confirm(){
    include("../conn.php");

    $id = mysqli_real_escape_string($con,$_GET['id']);
    $giverId = mysql_real_escape_string($con,$_GET['giverId']);
    $receiverId = mysql_real_escape_string($con,$_GET['receiverId']);
    $superStat = mysql_real_escape_string($con,$_GET['superStat']);
    $amount = floatval($_GET['amount']);


    $query = "update pairing set status='1' WHERE id='$id'";
    mysqli_query($con,$query)or die("Unable To Execute");

    $query2 = "select * from user WHERE id='$giverId'";
    $result2 = mysqli_query($con,$query2)or die("Unable To Execute");

    while($row = mysqli_fetch_assoc($result2)){
        echo json_encode($row['name']);
        $balance = floatval($row['balance']);

        $balance += $amount;

        $query5 = "UPDATE user SET balance='$balance',gh='1' WHERE id='$giverId'";
        mysqli_query($con,$query5)or die("Unable To Execute");
    }

    if($superStat == 0){

        $query3 = "select * from user WHERE id='$receiverId'";
        $result3 = mysqli_query($con,$query3)or die("Unable To Execute");

        while($row2 = mysqli_fetch_assoc($result3)){
            $balance = floatval($row2['balance']);

            $balance -= $amount;

            $query4 = "UPDATE user SET balance='$balance' WHERE id='$giverId'";
            mysqli_query($con,$query4)or die("Unable To Execute");
        }
    }
}