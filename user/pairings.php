<?php
/**
 * Created by PhpStorm.
 * User: GHostEater
 * Date: 31-Jan-17
 * Time: 10:01 AM
 */
function pairings(){
    include('../conn.php');

    $id = mysql_real_escape_string($_GET['id']);

    $query = "select * from pairing where status=1 and (giverId='$id' or receiverId='$id')";
    $result = mysqli_query($con,$query)or die("Unable To Execute");
    $i = 0;
    $resultsArr = "";

    while($row = mysqli_fetch_assoc($result)){
        $giverId = $row['giverId'];
        $receiverId = $row['receiverId'];
        $superStat = $row['superStat'];

        if($superStat == 1){
            $query2 = "select * from user WHERE id='$giverId'";
            $result2 = mysqli_query($con,$query2)or die("Unable To Execute");
            while($row2 = mysqli_fetch_assoc($result2)){
                $giver = $row2['name'];
                $giverPhone = $row2['phone'];
            }

            $query2 = "select * from superadmin WHERE id='$receiverId'";
            $result2 = mysqli_query($con,$query2)or die("Unable To Execute");
            while($row2 = mysqli_fetch_assoc($result2)){
                $receiver = $row2['name'];
                $receiverAcctNo = $row2['acctNo'];
                $receiverAcctName = $row2['acctName'];
                $receiverBank = $row2['bank'];
                $receiverPhone = $row2['phone'];
            }
        }
        else{
            $query2 = "select * from user WHERE id='$giverId'";
            $result2 = mysqli_query($con,$query2)or die("Unable To Execute");
            while($row2 = mysqli_fetch_assoc($result2)){
                $giver = $row2['name'];
                $giverPhone = $row2['phone'];
            }

            $query2 = "select * from user WHERE id='$receiverId'";
            $result2 = mysqli_query($con,$query2)or die("Unable To Execute");
            while($row2 = mysqli_fetch_assoc($result2)){
                $receiver = $row2['name'];
                $receiverAcctNo = $row2['acctNo'];
                $receiverAcctName = $row2['acctName'];
                $receiverBank = $row2['bank'];
                $receiverPhone = $row2['phone'];
            }
        }

        $resultsArr[$i] = [
            'id' => $row['id'],
            'giverId' => $row['giverId'],
            'giverAmount' => $row['giverAmount'],
            'giver' => $giver,
            'giverPhone' => $giverPhone,
            'receiverId' => $row['receiverId'],
            'receiver' => $receiver,
            'receiverAcctNo' => $receiverAcctNo,
            'receiverAcctName' => $receiverAcctName,
            'receiverBank' => $receiverBank,
            'receiverPhone' => $receiverPhone,
            'status' => $row['status'],
            'superStat' => $row['superStat']
        ];
        $i+=1;
    }
    header("HTTP/1.0 201 Success");
    echo json_encode($resultsArr);
}