<?php
 $insert =  false;// for confirming mesage after navbar     
 $update = false;// for confirming mesage after navbar     
 $delete = false;// for confirming mesage after navbar     
// connecting to db
$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";
// create a connection 
$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("sorry conn not successfull".mysqli_connect_error());
}
else{
    // echo "connection with db successfull";
}
// for delete operation (last step code)
if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $sql="DELETE FROM `notes` WHERE `sno` = '$sno'";
$result = mysqli_query($conn,$sql);
if($result){
    $delete = true;
}

}
 
if($_SERVER['REQUEST_METHOD']=='POST'){
    //for update operation (second last step)
    if(isset($_POST['snoedit'])){
    // echo 'updated';
    $sno = $_POST['snoedit'];
    $title = $_POST['titleedit'];
    $description = $_POST['descriptionedit'];
$sql = "UPDATE `notes` SET `title` = '$title' , `description` = '$description' WHERE `sno` = $sno";
$result = mysqli_query($conn,$sql);
if($result){
    $update = true;
}
    }
   
    else{
           //for create operation (third last step)
    $title = $_POST['title'];
    $description = $_POST['description'];
$sql = "INSERT INTO `notes` (`title`,`description`) VALUES ('$title', '$description')";
$result = mysqli_query($conn,$sql);
if($result){
    $insert = true;
}
else{
    // echo "the insertion was not created".mysqli_error($conn);
}
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">


    <title>Note App</title>
</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="modaleditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modaledit">Edit Notes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/CRUDPROJECT/index.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="snoedit" id="snoedit">
                        <div class="mb-3">
                            <label for="titleedit" class="form-label">Title:</label>
                            <input type="text" name='titleedit' class="form-control" id="titleedit"
                                aria-describedby="emailHelp" placeholder="Your Title">
                        </div>

                        <div>
                            <label for="descriptionedit">Description:</label>
                            <textarea name='descriptionedit' class="form-control" placeholder="Your Description"
                                id="descriptionedit" style="height: 100px"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/CRUDPROJECT/index.php">Note App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/CRUDPROJECT/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">About Us</a>
                    </li>


                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- confirm message display -->
    <?php
if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your note has been inserted successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
?>
    <?php
if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your note has been Updated successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
?>
    <?php
if($delete){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Success!</strong> Your note has been Deleted successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
?>

    <!-- navbar  END -->

    <!--INSERT SECTION  -->
    <div class="container my-1 border-primary">
        <h3>Welcome to magic notes app</h3>
        <form action="/CRUDPROJECT/index.php" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" name='title' class="form-control" id="title" aria-describedby="emailHelp"
                    placeholder="Your Title">
            </div>

            <div>
                <label for="floatingTextarea2">Description:</label>
                <textarea name='description' class="form-control" placeholder="Your Description" id="floatingTextarea2"
                    style="height: 100px"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
    <!-- TABLES  -->
    <div class="container">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Sno</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
  // fetch all the data 
$sql = "SELECT * FROM `notes`";
$result = mysqli_query($conn,$sql);
  $sno = 0;
  while($row = mysqli_fetch_assoc($result)){
    $sno++;
    echo " <tr>
    <th>".$sno."</th>
    <td>".$row['title']."</td>
    <td>".$row['description']."</td>
    <td><button id=".$row['sno']." type='submit' class='btn btn-sm btn-primary edit'>Edit</button>
     <button type='submit'  class='btn btn-sm btn-danger delete' id=d".$row['sno'].">Delete</button> </td>
    </tr>";
    
}
?>

            </tbody>
        </table>
    </div>
    <hr>
    <footer class="mx-auto">
        <div class="inner bg-dark">
            <p class="text-center text-white py-1">RAJA USMAN MURAD</p>
        </div>
    </footer>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () { $('#myTable').DataTable(); });

    </script>
    <script>
        // script for edit button  
        edits = document.getElementsByClassName("edit")
        Array.from(edits).forEach((elem) => {
            elem.addEventListener('click', (e) => {
                console.log('clicked the button');
                tr = e.target.parentNode.parentNode;
                console.log(tr);
                title = tr.getElementsByTagName('td')[0].innerHTML;
                description = tr.getElementsByTagName('td')[1].innerHTML;
                console.log(title, description);
                titleedit.value = title;
                descriptionedit.value = description;
                snoedit.value = e.target.id;
                console.log(e.target.id);
                $('#modaledit').modal('toggle');
            })
        });
        // script for delete button  
        deletes = document.getElementsByClassName("delete")
        Array.from(deletes).forEach((elem) => {
            elem.addEventListener('click', (e) => {
                console.log('clicked the button');


                sno = e.target.id.substr(1,);
                // console.log(e.target.id);
                if (confirm("Are you sure you want to delete this note?")) {
                    window.location = `/CRUDPROJECT/index.php?delete=${sno}`
                    console.log('yes')
                }
                else {
                    console.log('no');
                }
            })
        })
    </script>
</body>

</html>