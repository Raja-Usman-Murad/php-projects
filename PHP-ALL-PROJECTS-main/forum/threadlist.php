<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>iForum</title>
</head>

<body>
    <!-- navbar start -->
    <?php require "./partials/_header.php"; ?>
    <!-- navbar start end -->

    <!-- php for getting data of catname and desc start  -->
    <?php
require "./partials/_dbconnect.php";
$catid = $_GET['catid'];
$sql = "SELECT * FROM `categories` WHERE category_id = $catid";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
    $catname = $row['category_name'];
    $catdesc = $row['category_desc'];
}
?>
    <!-- php for getting data of catname and desc end  -->

    <!-- php for post form data of start  -->
    <?php
    $showalert = false;
if($_SERVER['REQUEST_METHOD']=="POST"){
    // echo "usman";
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `dated`) VALUES ( '$title', '$desc', '$catid', '0', current_timestamp())";
    $result = mysqli_query($conn,$sql);
    $showalert = true;
}
?>
    <!-- php for post form data of end  -->

    <!-- php for alert start-->
    <?php
if($showalert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your thread has been added! please wait for community for respond.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
?>
    <!-- php for alert end-->

    <!--main catName and CatDESC jumbotron container start -->
    <div class="container py-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname ?> Forums</h1>
            <p class="lead"><?php echo $catdesc ?></p>
            <hr class="my-4">
            <p style="font-size:17px" class="lead">No Spam / Advertising / Self-promote in the forums.
                Do not post copyright-infringing material.
                Do not post “offensive” posts, links or images.
                Do not cross post questions</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>
    <!--main catName and CatDESC jumbotron container end -->

    <!-- form container start -->
    <?php
     if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
         echo ' <div class="container">
         <h1 class="py-2">Start a Discussion:</h1>
         <form action=""  '.$_SERVER['PHP_SELF'].' method="post">
    <div class="form-group">
        <label for="title">Problem Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">Keep yor title as short and crisp as
            possible.</small>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Elaborate Your Concern</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    </form>
    </div>';
    }
    else{
        echo '<div class="container">
        <h1 class="py-2">Start a Discussion:</h1>
        <p class="lead">You are not logged in. Please login to be able to satrt a discussion. </p>
        </div>';
    }
    
    ?>

    <!-- form container end -->

    <!-- BROWSE QUESTION SECTION START  -->
    <div class="container py-4">
        <h1 class="py-2">Browse Questions:</h1>
        <!-- php for getting question data from data base start   -->
        <?php
require "./partials/_dbconnect.php";
$cat_id = $_GET['catid'];
$sql = "SELECT * FROM `threads` WHERE thread_cat_id = $cat_id";
$result = mysqli_query($conn, $sql);
// echo var_dump($result);
$noresult = true;
while ($row = mysqli_fetch_assoc($result)){
    $noresult = false;
    $threadid = $row['thread_id'];
    $threadtitle = $row['thread_title'];
    $threaddesc = $row['thread_desc'];
    $time = $row['dated'];
    // echo $catname;
        
echo '<div class="media">
      <img src="http://simpleicon.com/wp-content/uploads/user1.png" width="50px" class="mr-3" alt="user image">
     <div class="media-body">
     <small>Anonymus at '.$time.' </small> <br>         
        <a class="text-dark" href="/forum/threads.php?threadid='.$threadid.'">'.$threadtitle.'</a></h5>
        <p class="lead" style="font-size:17px">'.$threaddesc.'</p>      
    </div> 
    </div>';
}
if($noresult){
    echo '<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <p class="display-4">No Threads Found</p>
      <p class="lead">Be the first person to ask a question</p>
    </div>
  </div>';
}

?>
        <!-- php for getting question data from data base END   -->
        <!-- BROWSE QUESTION SECTION END  -->

        <!-- footer container  -->
        <?php require "./partials/_footer.php"; ?>
        <!-- footer container end -->

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>

</html>

</html>