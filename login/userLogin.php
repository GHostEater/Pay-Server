<?php
/**
 * Created by PhpStorm.
 * User: GHostEater
 * Date: 28-Jan-17
 * Time: 9:24 AM
 */
function UserLogin(){
    include("../conn.php");

    $username = mysqli_real_escape_string($con,$_GET['username']);
    $password = mysqli_real_escape_string($con,$_GET['password']);

    $query = "SELECT * FROM user WHERE username='$username' or email='$username'";
    $result = mysqli_query($con,$query)or die("Unable To Execute");
    $nRows = mysqli_num_rows($result);
    $loginArr = '';

    if($nRows > 0){
        $query2 = "SELECT * FROM user WHERE (username='$username' or email='$username') AND aes_decrypt(password,'7037286040')='$password'";
        $result2 = mysqli_query($con,$query2)or die("Unable To Execute");
        $nRows2 = mysqli_num_rows($result2);

        if($nRows2 > 0){
            while($row = mysqli_fetch_assoc($result2)){
                $loginArr = [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'username' => $row['username'],
                    'balance' => $row['balance'],
                    'rank' => 3
                ];
            }
            header("HTTP/1.0 201 Success");
            echo json_encode($loginArr);
        }
        else{
            header("HTTP/1.0 402 Incorrect Password");
        }
    }

    else{
        header("HTTP/1.0 401 Incorrect Username");
    }
}