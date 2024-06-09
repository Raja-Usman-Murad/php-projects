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

    <!-- image slider start  -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/2000x500/?coding,programming" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2000x500/?apple,code" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2000x500/?programmer,apple" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- image slider start end  -->

    <!-- main heading start  -->
    <div class="container mt-3">
        <h1 class="text-center">iDiscuss - Categories</h1>
    </div>
    <!-- main heading start  -->

    <!--Categories card container  -->
    <div class="container">
        <div class="row">
            <!-- write php for fetch all the categories from database  -->
            <?php 
            require "./partials/_dbconnect.php";
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
            //  while loop laga ky sub fetch krna hay is jaga
            while ($row = mysqli_fetch_assoc($result)){
                $id = $row['category_id'];
                $catname = $row['category_name'];
                $catdesc = $row['category_desc'];
                echo  '<div class="col-md-4 mt-5">
                <div class="card" style="width: 18rem;">
                    <img src="https://source.unsplash.com/1600x900/?coding,'.$catname.' class="card-img-top" alt="images">
                    <div class="card-body">
                        <a href="/forum/threadlist.php?catid='.$id.'" class="card-title">'.$catname.'</a>
                        <p class="card-text">'.substr( $catdesc,0,35).'...</p>
                        <a href="/forum/threadlist.php?catid='.$id.'" class="btn btn-primary">View Threads</a>
                    </div>
                </div>
            </div>';
            }
            ?>
            <!-- write php for fetch all the categories from database END -->
        </div>
    </div>
    <!--Categories card container end -->

    <!-- footer container start -->
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