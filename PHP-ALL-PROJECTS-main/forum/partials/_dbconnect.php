<?php
// connecting to db
$servername = "localhost";
$username = "root";
$password = "";
$database = "idiscuss";
// create a connection 
$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    echo "db not connect";
    die("sorry conn not successfull".mysqli_connect_error());
}
?>