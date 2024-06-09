<?php
$showError = 'false';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include "_dbconnect.php";
    $useremail = $_POST['signupemail'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $sql = "SELECT * FROM `users` where user_email = '$useremail'";
    $result= mysqli_query($conn,$sql);
    $numofrows = mysqli_num_rows($result);
    if($numofrows>0){
        // echo 'email already in use';
        $showError = 'Email already in use';
    }
    else{
        if($password == $cpassword){
$hash = password_hash($password,PASSWORD_DEFAULT);
$sql = "INSERT INTO `users` (`user_email`, `user_password`, `dated`) VALUES ( '$useremail', '$hash', current_timestamp())";
$result= mysqli_query($conn,$sql);
if($result){
    // $showAlert = true;
    header("location: ../index.php?signupsuccess=true");
    exit();
}
        }
        else{
            // echo 'passworddonotmatch';
            $showError = 'password donot match';
        }
    }
    header("location: ../index.php?signupsuccess=false&error=$showError");
    
}
?>