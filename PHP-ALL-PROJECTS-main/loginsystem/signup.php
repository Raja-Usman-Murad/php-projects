<?php
$insertionMsg = false;
$showerror = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
require "./partials/_dbconnect.php";
$username = $_POST["username"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
// check user existing 
$sql = "SELECT * FROM `users` WHERE username='$username'";
$result = mysqli_query($conn,$sql);
$numExistRows = mysqli_num_rows($result);
if($numExistRows>0){
    $showerror = 'user already exist';
}
else{
    if($password == $cpassword  && $username!="" && $password!="" && $cpassword!="" ){
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`username`,`password`) VALUES ('$username', '$hash')";
$result = mysqli_query($conn,$sql);
if($result){
    $insertionMsg = true;
}
else{
    die("sorry can not insert data".mysqli_connect_error());
}
}
else{
    $showerror = 'password donot match';
}
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
require "./partials/_header.php";
   ?>
</head>

<body>
    <?php
    require "./partials/_navbar.php";
    ?>
    <?php
    if($insertionMsg){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    }
    ?>
    <?php
    if($showerror){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Opps!</strong> '.$showerror.'.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    }
    ?>
    <div class="container mt-2 bg-dark text-white">
        <h1>Signup to our Website</h1>
        <form method="post" action="/loginsystem/signup.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                    aria-describedby="emailHelp">

            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword"
                    placeholder="Confirm Password">
                <small id="emailHelp" class="form-text text-muted">Make sure to type the same password.</small>
            </div>

            <button type="submit" class="btn btn-primary">SignUp</button>
        </form>
    </div>
    <!-- bootstrap links -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <!-- bootstrap links end-->
</body>

</html>