<?php
// connecting to db
$servername = "localhost";
$username = "root";
$password = "";
$database = "users";
// create a connection 
$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("sorry conn not successfull".mysqli_connect_error());
}
?>