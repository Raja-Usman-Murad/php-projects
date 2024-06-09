<?php
session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="/forum/index.php">iForum</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="/forum/index.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/forum/about.php">About</a>
    </li>

    
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Categories
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">Action</a>
        <div class="dropdown-divider">
      </div>
    </li>


    <li class="nav-item">
      <a class="nav-link" href="/forum/contact.php"">Contact</a>
    </li>
  </ul>
  <div class="row">';
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  echo '<form class="form-inline my-2 my-lg-0 ml-3">
  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
  <a href="./partials/_logout.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">LogOut</a>
  <p class="text-light mb-0 px-1">Welcome: '.$_SESSION['useremail'].'</p>
</form>';
  }
  else{
    echo '<button class="btn btn-outline-success mr-2 ml-2" data-toggle="modal" data-target="#loginModal">Login</button>
    <button class="btn btn-outline-success mr-2 ml-2" data-toggle="modal" data-target="#signupModal">Signup</button>';
  }
    
      
echo '</nav>';
 include "./partials/_loginModal.php";
 include "./partials/_signupModal.php";
 if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
   echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
   <strong>Success!</strong> You can now login
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
</div>';
 }
 if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false"){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> '.$_GET['error'].'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>