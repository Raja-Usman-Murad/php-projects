<?php
$loginMsg = false;
$notloginMsg = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
require "./partials/_dbconnect.php";
$username = $_POST["username"];
$password = $_POST["password"];
// $sql = "Select * from users where username='$username' AND password='$password'";
$sql = "Select * from users where username='$username'";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if ($num == 1){
    while($row=mysqli_fetch_assoc($result)){
        if (password_verify($password, $row['password'])){ 
            $loginMsg = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location: welcome.php");
        } 
        else{
            $notloginMsg = "Invalid Credentials";
            // echo "password hash ni oa";
        }
    }
    
} 
else{
    $notloginMsg = "Invalid Credentials";
   
}
}



// $sql = "Select * from users where username='$username'";
// $result = mysqli_query($conn,$sql); //its gives us object
// $num = mysqli_num_rows($result); //its give us no of rows
// // echo var_dump($result);
// if($num == 1){  
//    while($row = mysqli_fetch_assoc($result)){
//         echo var_dump($row);
//         echo var_dump($row['password']);
//         if(password_verify($password,$row['password'])){
//         echo "password hash o gya hay";
//         $loginMsg = true;
//         session_start();
//         $_SESSION['loggedin'] = true;
//         $_SESSION['username'] = $username;
//         header ("location:welcome.php");
//        }
//        else{
//         $notloginMsg = true;
//         echo "password hash ni oa";
//        }
//     }
// }
// else{
//     $notloginMsg = true;
// }
// }
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
    if($loginMsg){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Yor are logged In.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    }
    ?>
    <?php
    if($notloginMsg){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Opps!</strong> invalid Credentials.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    }
    ?>
    <div class="container mt-2 pt-3 bg-dark text-white">
        <h1>Login to our Website</h1>
        <form method="post" action="/loginsystem/login.php">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                    aria-describedby="emailHelp">

            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary mb-3">LogIn</button>
            <a href="/loginsystem/signup.php" class="btn btn-primary mb-3">SignUp</a>
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

</html>