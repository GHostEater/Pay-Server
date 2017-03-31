<?php
/**
 * Created by PhpStorm.
 * User: GHostEater
 * Date: 26-Feb-16
 * Time: 10:29 AM
 */
function Users(){
    include('../conn.php');
    $query = "select *,aes_decrypt(password,'7037286040') from user";
    $result = mysqli_query($con,$query)or die("Unable To Execute");
    $i = 0;
    $resultsArr = "";

    while($row = mysqli_fetch_assoc($result)){
        $resultsArr[$i] = [
            'id' => $row['id'],
            'name' => $row['name'],
            'username' => $row['username'],
            'password' => $row["aes_decrypt(password,'7037286040')"],
            'email' => $row['email'],
            'sex' => $row['sex'],
            'dateBirth' => date('c',strtotime($row['dateBirth'])),
            'state' => $row['state'],
            'city' => $row['city'],
            'acctNum' => $row['acctNum'],
            'acctName' => $row['acctName'],
            'bank' => $row['bank'],
            'phone' => $row['phone'],
            'balance' => $row['balance'],
            'gh' => $row['gh'],
            'datePh' => date('c',strtotime($row['datePh']))
        ];
        $i+=1;
    }
    header("HTTP/1.0 201 Success");
    echo json_encode($resultsArr);
}