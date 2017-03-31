<?php
/**
 * Created by PhpStorm.
 * User: GHostEater
 * Date: 26-Feb-16
 * Time: 10:29 AM
 */
function SuperAdmins(){
    include('../conn.php');

    $query = "SELECT *,aes_decrypt(password,'7037286040') FROM superadmin";
    $result = mysqli_query($con,$query)or die("Unable To Execute");
    $i = 0;
    $resultsArr = "";

    while($row = mysqli_fetch_assoc($result)){
        $resultsArr[$i] = [
            'id' => $row['id'],
            'username' => $row['username'],
            'name' => $row['name'],
            'acctNum' => $row['acctNum'],
            'acctName' => $row['acctName'],
            'bank' => $row['bank'],
            'password' => $row["aes_decrypt(password,'7037286040')"],
            'phone' => $row['phone']
        ];
        $i+=1;
    }
    echo json_encode($resultsArr);
    header("HTTP/1.0 201 Success");
}