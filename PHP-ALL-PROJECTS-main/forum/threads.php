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

    <!-- php for get data of thread title and thred desc from db start -->
    <?php
require "./partials/_dbconnect.php";
$threadid = $_GET['threadid'];
$sql = "SELECT * FROM `threads` WHERE thread_id = $threadid";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
    $title = $row['thread_title'];
    $desc = $row['thread_desc'];
}
?>
    <!-- php for get data of thread title and thred desc from db start -->


    <!-- php for post the comments into database start  -->
    <?php
    $showalert = false;
if($_SERVER['REQUEST_METHOD']=="POST"){
    // echo "usman";
    $comment = $_POST['comment'];
    $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `dated`) VALUES ('$comment', '$threadid', 'Annonymus', current_timestamp());";
    $result = mysqli_query($conn,$sql);
    $showalert = true;
}
?>
    <!-- php for post form data of end  -->

    <!-- php for alert start-->
    <?php
if($showalert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your thread has been added! please wait for community to respond.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
?>
    <!-- php for alert end-->
    <!-- php for post the comments into database end  -->


    <!-- jumbotron container for thread title and desc start -->
    <div class="container py-4">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title ?></h1>
            <p class="lead"><?php echo $desc ?></p>
            <hr class="my-4">
            <p style="font-size:17px" class="lead">No Spam / Advertising / Self-promote in the forums.
                Do not post copyright-infringing material.
                Do not post “offensive” posts, links or images.
                Do not cross post questions</p>
            <p><b>Posted by: RAJA USMAN</b></p>
        </div>
    </div>
    <!-- jumbotron container for thread title and desc end -->



    <!-- comment form container start -->
    <?php 
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo '   <div class="container">
    <h1 class="py-2">Post a Comment:</h1>
    <form action="" '.$_SERVER['PHP_SELF'].'" method="post">
    <div class="form-group">
        <label for="comment">Type Your Comment</label>
        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Post Comment</button>
    </form>
    </div>';
    }
    else{
    echo '<div class="container">
        <h1 class="py-2">Post a Comment:</h1>
        <p class="lead">You are not logged in. Please login to be able to post comment. </p>
    </div>';
    }
    ?>

    <!-- comment form container end -->

    <!-- Discussion SECTION START  -->
    <div class="container py-4">
        <h1 class="py-2">Discussions</h1>
        <!-- php for recieve comments from database start  -->
        <?php
require "./partials/_dbconnect.php";
$thread_id = $_GET['threadid'];
$sql = "SELECT * FROM `comments` WHERE thread_id = $thread_id";
$result = mysqli_query($conn, $sql);
// echo var_dump($result);
$noresult = true;
while ($row = mysqli_fetch_assoc($result)){
    $noresult = false;
    $comment_id = $row['comment_id'];
    $commentcontent = $row['comment_content'];
    $time = $row['dated'];
    $threadid = $row['thread_id'];
    $username = $row['comment_by'];
    // echo $catname;
        
echo '<div class="media">
<img src="http://simpleicon.com/wp-content/uploads/user1.png" width="50px" class="mr-3" alt="user image">
     <div class="media-body">          
     <p class="font-weight-bold">'.$username.' at '.$time.' </p>
        <p class="lead" style="font-size:17px">'.$commentcontent.'</p>  
            
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
        <!-- php for recieve comments from database end -->
        <!-- Discussion SECTION END  -->

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