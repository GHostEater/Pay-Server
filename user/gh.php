<?php
/**
 * Created by PhpStorm.
 * User: GHostEater
 * Date: 31-Jan-17
 * Time: 9:07 AM
 */
function Gh(){
    include("../conn.php");

    $id = mysqli_real_escape_string($con,$_GET['id']);
    $superStat = mysqli_real_escape_string($con,$_GET['superStat']);
    $amount = intval(mysqli_real_escape_string($con,$_GET['amount']));

    $query = "select * from pairing where status='0' and giverAmount='$amount' AND giverId!='$id' LIMIT 1";
    $result = mysqli_query($con,$query)or die("Unable To Execute");
    $nRows = mysqli_num_rows($result);
    if($nRows == 1){
        while($row = mysqli_fetch_assoc($result)){
            $pairId = $row['id'];
            $query = "UPDATE pairing SET receiverId='$id',status='1',superStat='$superStat' where id = '$pairId'";
            mysqli_query($con,$query)or die("Unable To Execute");
            $query = "UPDATE user SET gh='0' where id = '$id'";
            mysqli_query($con,$query)or die("Unable To Execute");
        }
        header("HTTP/1.0 201 Success");
    }
    else{
        $query = "select * from pairing where status='0' AND giverId!='$id' ORDER BY giverAmount DESC";
        $result = mysqli_query($con,$query)or die("Unable To Execute");
        $nRows2 = mysqli_num_rows($result);
        if($nRows2 > 0){
            while($row = mysqli_fetch_assoc($result) && $amount > 0){
                $pairId = $row['id'];
                $giverAmount = intval($row['giverAmount']);

                if($giverAmount <= $amount){
                    $query = "UPDATE pairing SET receiverId='$id',status='1',superStat='$superStat' where id = '$pairId'";
                    mysqli_query($con,$query)or die("Unable To Execute");
                    $amount = $amount - $giverAmount;
                    $query = "UPDATE user SET gh='0' where id = '$id'";
                    mysqli_query($con,$query)or die("Unable To Execute");
                }
            }
            header("HTTP/1.0 201 Success");
        }
        else{
            header("HTTP/1.0 401 No Pairs Available");
        }
    }
}