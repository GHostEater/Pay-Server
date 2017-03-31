<?php
/**
 * Created by PhpStorm.
 * User: GHostEater
 * Date: 19-Feb-16
 * Time: 8:26 AM
 */

$host = 'localhost';
$db = 'steady';
$db_user = 'root';
$db_pass = '';

//$host = 'mysql.uhostfull.com';
//$db = 'u858764242_track';
//$db_user = 'u858764242_track';
//$db_pass = 'punch8';

$con = mysqli_connect($host,$db_user,$db_pass,$db)or die("Could Not Connect to MySQL");