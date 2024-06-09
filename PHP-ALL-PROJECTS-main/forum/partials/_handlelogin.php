<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include "_dbconnect.php";
    $email = $_POST['loginemail'];
    $password = $_POST['loginpassword'];
    $sql = "SELECT * FROM `users` where user_email = '$email'";
    $result= mysqli_query($conn,$sql);
    $numofrows = mysqli_num_rows($result);
    if($numofrows == 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password,$row['user_password'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['useremail'] = $email;
            echo "loggedin".$email;
        }
        header("location: ../index.php");
    }
    header("location: ../index.php");
}

?>