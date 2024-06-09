<?php
// connecting to db
$servername = "sql301.epizy.com";
$username = "epiz_29221538";
$password = "tCKkQF9q3e5Qx2";
$database = "epiz_29221538_hustudentregestration";
// create a connection 
$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("sorry conn not successfull".mysqli_connect_error());
}
?>