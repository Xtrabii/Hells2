<?php

$base_url = 'http://localhost/shopping_cart/';

$dbhost = 'localhost';
$dbname = 'shopping_cart';
$username = 'root';
$password = '';

date_default_timezone_set("Asia/Bangkok");

// สร้างการเชื่อมต่อฐานข้อมูลโดยใช้ mysqli
$con = mysqli_connect($dbhost, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
