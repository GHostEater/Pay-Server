<?php
/**
 * Created by PhpStorm.
 * User: GHostEater
 * Date: 26-Feb-16
 * Time: 10:29 AM
 */
function Admins(){
    include('../conn.php');

    $query = "select *,aes_decrypt(password,'7037286040') from admin";
    $result = mysqli_query($con,$query)or die("Unable To Execute");
    $i = 0;
    $resultsArr = "";

    while($row = mysqli_fetch_assoc($result)){
        $resultsArr[$i] = [
            'id' => $row['id'],
            'username' => $row['username'],
            'password' => $row["aes_decrypt(password,'7037286040')"],
            'name' => $row['name']
        ];
        $i+=1;
    }
    header("HTTP/1.0 201 Success");
    echo json_encode($resultsArr);
}