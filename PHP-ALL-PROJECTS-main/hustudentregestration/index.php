<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./partials/css/index.css">
    <!-- <script src="./partials/javascript/index.js"></script> -->
    <!-- <link rel="icon" type="image/png" href=""/> -->
    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>student registration</title>
</head>

<body>
    <section>
        <div class="row p-0">
            <div class="div col-md-10 mx-auto">
                <!-- navbar start  -->
                <?php
                            include "./partials/_navbar.php";
                        ?>
                <!-- navbar end  -->

                <!-- datetime section start  -->
                <div class="py-3 d-flex justify-content-end align-items-center mx-auto">
                    <p id="day" class="datetime btn btn-outline-primary">day 📅</p>
                    <p id="date" class="datetime btn btn-outline-primary">date 📅</p>
                    <p id="time" class="datetime btn btn-outline-primary">time ⏲️</p>
                </div>
                <!-- datetime section end  -->

                <!-- main content start  -->
                <div class="container d-flex flex-row">

                    <div class="row justify-content-center align-items-center">
                        <!-- left side  -->
                        <div class="col-md-6 row">
                            <h1>Welcome To <h1 id="hc">Hazara University Mansehra</h1>
                            </h1><br>
                            <a class="regesterbtn w-50 text-center" href="regestration.php">Register Yourself</a>
                        </div>
                        <!-- right side  -->
                        <div class="col-md-6">
                            <img src="https://s3.eu-north-1.amazonaws.com/images.free-apply.com/uni/gallery/lg/1058600103/f3c28eaa8bec5e14e62b3d8565fc7c6f9a6c54de.jpg"
                                alt="hulogo" class="img-thumbnail animated">
                        </div>
                    </div>
                </div>
                <!-- main content end  -->

                <!-- Already student regester section start -->
                <div class="container mt-4">
                    <h1 class="text-center ars">Already Registered Students</h1>
                    <div class="row">
                        <!-- while loop lagy ge idr sy -->
                        <?php
                $studentrecord=true;
require "./partials/_dbconnect.php";
$sql = "SELECT * FROM `users`";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
    $studentrecord = false;
    $name = $row['name'];
    $fname = $row['fname'];
    $cnic = $row['cnic'];
    $rollno = $row['rollno'];
    $department = $row['department'];
    echo '<div class="col-md-4 my-5">
    <!-- upper part  -->
    <div class="row ">
        <!-- for logoimg -->
        <div class="col-md-4 ">
            <img src="https://upload.wikimedia.org/wikipedia/en/2/28/Hazara_University_logo.jpeg"
                alt="hulogo" width="65px" class="rounded-circle">
        </div>
        <!-- for data -->
        <div class="col-md-8">
            <small>HAZARA UNIVERSITY</small>
            <br>
            <small>MANSEHRA PAKISTAN</small><br>
            <h5>STUDENT ID CARD</h5>
        </div>
    </div>
    <!-- middle part  -->
    <div class="row d-flex">
        <!-- info part -->
        <div class="col-md-8 mt-4 justify-content-center">
            <small>Name: '.$name.'</small>
            <br>
            <small>Father Name: '.$fname.'</small><br>
            <small>CNIC: '.$cnic.'</small><br>
            <small>RollNo: '.$rollno.'</small>

        </div>
        <!-- user img part -->
        <div class="col-md-4">
            <img src="https://d29fhpw069ctt2.cloudfront.net/icon/image/37746/preview.svg"
                class="circle-rounded img-fluid" alt="">
        </div>
    </div>
    <!-- bottom part -->
    <div class="row">
        <!-- data -->
        <div class="col-md-12">
            <small>Department: '.$department.'</small>
        </div>
    </div>

</div>';
}
?>
                        <?php
                    if($studentrecord){
                    echo '<div class="jumbotron">
                    <p class="lead nsrcbtr">No Student Regester. click below button to regester yourself.</p>
                    
                    <a class="regesterbtn" href="regestration.php" role="button">Regester Yourself</a>
                  </div>';
                    }
                    ?>








                    </div>
                </div>
                <!-- Already student regester section end -->
            </div>
        </div>
    </section>
    <!-- footer start -->
    <?php
include "./partials/_footer.php";
?>
    <!-- footer end -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

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
    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script> -->

</body>

</html>