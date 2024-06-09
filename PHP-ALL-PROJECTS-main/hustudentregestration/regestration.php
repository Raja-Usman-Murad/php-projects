<!-- post data inotto database  -->
<?php
$insertionMsg = false;
if($_SERVER['REQUEST_METHOD']=='POST'){
    require "./partials/_dbconnect.php";
    $name = $_POST["name"];
    $fname = $_POST["fname"];
    $cnic = $_POST["cnic"];
    $rollno = $_POST["rollno"];
    $department = $_POST["department"];
    // check user existing
    $sql = "SELECT * FROM `users` WHERE cnic='$cnic' OR rollno='$rollno'";
$result = mysqli_query($conn,$sql);
$numExistRows = mysqli_num_rows($result);
if($numExistRows>0){
    $insertionMsg = true;
}else{
    $sql = "INSERT INTO `users` (`name`, `fname`, `cnic`, `rollno`, `department`) VALUES ('$name', '$fname', '$cnic', '$rollno', '$department')";
$result = mysqli_query($conn,$sql);
if($result){
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong> You are now Regester.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    header("location: index.php");
}
else{
    echo " not inserted";
}
}
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="./partials/javascript/index.js"></script>
    <link rel="stylesheet" href="./partials/css/index.css">
    <link rel="stylesheet" href="./partials/css/index.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>student registration</title>
</head>

<body>
    <section>
        <div class="row">
            <div class="div col-md-10 mx-auto">
                <!-- navbar start  -->
                <?php
                    include "./partials/_navbar.php";
                        ?>
                <!-- navbar end  -->
                <?php
if($insertionMsg){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Oppps!</strong> User already exist.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>


                <!-- images slider start -->
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://source.unsplash.com/2400x500/?university,regestration"
                                class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://source.unsplash.com/2400x500/?form,university" class="d-block w-100"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://source.unsplash.com/2400x500/?regester,form" class="d-block w-100"
                                alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-- images slider end -->


                <div class="py-3 d-flex justify-content-end align-items-center text-dark mx-auto">
                    <p id="day" class="datetime btn btn-outline-primary">day 📅</p>
                    <p id="date" class="datetime btn btn-outline-primary">date 📅</p>
                    <p id="time" class="datetime btn btn-outline-primary">time ⏲️</p>
                </div>




                <!-- form section start  -->
                <div class="container mt-5">
                    <h1 class="text-center text-success ">Registration Form</h1>
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <form action="regestration.php" method="post" class=" needs-validation" novalidate>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="fname">Father Name</label>
                                        <input type="text" name="fname" class="form-control" id="fname" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="cnic">CNIC</label>
                                        <input type="number" name="cnic" class="form-control" id="cnic" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="rollno">Roll No</label>
                                        <input type="number" name="rollno" class="form-control" id="rollno" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="department">Department</label>
                                        <input type="text" name="department" class="form-control" id="department"
                                            required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>

                                </div>

                                <button class="regesterbtn" type="submit">Submit form</button>
                            </form>
                        </div>
                    </div>
                    <!-- form section end  -->


                    <!-- footer start -->
                    <?php
include "./partials/_footer.php";
?>
                    <!-- footer end -->


                    <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function() {
                        'use strict';
                        window.addEventListener('load', function() {
                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                            var forms = document.getElementsByClassName('needs-validation');
                            // Loop over them and prevent submission
                            var validation = Array.prototype.filter.call(forms, function(form) {
                                form.addEventListener('submit', function(event) {
                                    if (form.checkValidity() === false) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                            });
                        }, false);
                    })();
                    </script>
                </div>
                <!-- form section end  -->
            </div>
        </div>
    </section>
    <script>
    // date  
    var today = new Date();
    var date =
        today.getFullYear() + "-" + (today.getMonth() + 1) + "-" + today.getDate();
    console.log(date);
    document.getElementById("date").innerHTML = date;


    // day 
    const getcurrentday = () => {
        let weekday = new Array(7);
        weekday[0] = "Sunday";
        weekday[1] = "Monday";
        weekday[2] = "Tuesday";
        weekday[3] = "Wednesday";
        weekday[4] = "Thursday";
        weekday[5] = "Friday";
        weekday[6] = "Saturday";
        const currentDay = new Date().getDay();
        days = weekday[currentDay];
        let day = (document.getElementById("day").innerHTML = days);
    };

    getcurrentday();

    // time 
    setInterval(startTime, 1000);

    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('time').innerHTML = "⏲️" +
            h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }; // add zero in front of numbers < 10
        return i;
    }
    </script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
</body>

</html>