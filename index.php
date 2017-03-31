<?php
/**
 * Created by PhpStorm.
 * User: GHostEater
 * Date: 27-Jan-17
 * Time: 7:52 AM
 */
ob_start();
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require("conn.php");

echo "This is the Root of The API. Contact The System Admin for Instructions on Using Our API";