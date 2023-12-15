<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['client_id'] == 0)) {
    header('location:logout.php');
}
if (isset($_POST['submit'])) {
    $client_id = $_POST['client_id'];
    $name = $_POST['name'];
    $mobnum = $_POST['phone'];
    $email = $_POST['email'];
    $appdate = $_POST['date'];
    $aaptime = $_POST['time'];
    $specialization = $_POST['specialization'];
    $doctorlist = $_POST['doctorlist'];
    $message = $_POST['message'];
    $aptnumber = mt_rand(100000000, 999999999);
    $cdate = date('Y-m-d');

    if ($appdate <= $cdate) {
        echo '<script>alert("Appointment date must be greater than todays date")</script>';
    } else {
        $sql = "insert into tblappointment(AppointmentNumber,client_id, Name,MobileNumber,Email,AppointmentDate,AppointmentTime,Specialization,Doctor,Message)values(:aptnumber,:client_id,:name,:mobnum,:email,:appdate,:aaptime,:specialization,:doctorlist,:message)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':aptnumber', $aptnumber, PDO::PARAM_STR);
        $query->bindParam(':client_id', $client_id, PDO::PARAM_STR);
        $query->bindParam(':name', $name, PDO::PARAM_STR);
        $query->bindParam(':mobnum', $mobnum, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':appdate', $appdate, PDO::PARAM_STR);
        $query->bindParam(':aaptime', $aaptime, PDO::PARAM_STR);
        $query->bindParam(':specialization', $specialization, PDO::PARAM_STR);
        $query->bindParam(':doctorlist', $doctorlist, PDO::PARAM_STR);
        $query->bindParam(':message', $message, PDO::PARAM_STR);

        $query->execute();
        $LastInsertId = $dbh->lastInsertId();
        if ($LastInsertId > 0) {
            echo '<script>alert("Your Appointment Request Has Been Send. We Will Contact You Soon")</script>';
            echo "<script>window.location.href ='dashboard.php'</script>";
        } else {
            echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <title>Doctor Appointment System | Home Page</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/core.css">
    <link rel="stylesheet" href="assets/css/misc-pages.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Add Font Awesome for social icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- endbuild -->
    <script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/bootstrap-icons.css" rel="stylesheet">



    <link href="../css/templatemo-medic-care.css" rel="stylesheet">
    <script>
        Breakpoints();
    </script>


    <style>
        body {
            background-color: rgba(227, 228, 209, 0.916);

        }

        .info-box {
            color: #444444;
            text-align: center;
            box-shadow: 0 0 30px rgba(214, 215, 216, 0.6);
            padding: 30px 0 40px 0;
            width: 90%;
            border-radius: 20px;
            margin-left: 5rem;

        }
    </style>
    <script>
        function getdoctors(val) {
            alert(val);
            $.ajax({

                type: "POST",
                url: "get_doctors.php",
                data: 'sp_id=' + val,
                success: function(data) {
                    $("#doctorlist").html(data);
                }
            });
        }
    </script>
</head>

<body class="menubar-left menubar-unfold menubar-light">
    <!--============= start main area -->
    <?php include_once('includes/header.php'); ?><br>

    <!-- APP MAIN ==========-->
    <main id="app-main" class="app-main">
        <div class="wrap">
            <div class="col-sm-12 col-12 mx-auto">
                <div class="info-box bg-white">
                    <div class="booking-form">
                        <h2 class="text-center mb-lg-3 mb-2">Book an appointment</h2>
                        <?php
                        $cid = $_SESSION['client_id'];
                        $sql = "SELECT * from  clients where clients.ID=:cid";
                        $query = $dbh->prepare($sql);
                        $query->bindParam(':cid', $cid, PDO::PARAM_STR);
                        $query->execute();
                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                        $cnt = 1;
                        if ($query->rowCount() > 0) {
                            foreach ($results as $row) {               ?>
                                <form role="form" method="post">
                                    <input type="hidden" name="client_id" id="client_id" value="<?php echo $_SESSION['client_id']; ?>">

                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $row->FullName; ?> " required='true'>
                                        </div>
                                <?php $cnt = $cnt + 1;
                            }
                        } ?>
                                <br>
                                <div class="col-md-6 col-12">
                                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required='true'>
                                </div>
                                <br>
                                <div class="col-md-6 col-12">
                                    <input type="telephone" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number" maxlength="10">
                                </div>
                                <br>
                                <div class="col-md-6 col-12">
                                    <input type="date" name="date" id="date" value="" class="form-control">

                                </div>
                                <br>
                                <div class="col-md-6 col-12">
                                    <input type="time" name="time" id="time" value="" class="form-control">

                                </div>
                                <br>
                                <div class="col-md-6 col-12">
                                    <select onChange="getdoctors(this.value);" name="specialization" id="specialization" class="form-control" required>
                                        <option value="">Select specialization</option>
                                        <!--- Fetching States--->
                                        <?php
                                        $sql = "SELECT * FROM tblspecialization";
                                        $stmt = $dbh->query($sql);
                                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                                        while ($row = $stmt->fetch()) {
                                        ?>
                                            <option value="<?php echo $row['ID'];
                                                            ?>"><?php echo $row['Specialization'];
                                                                ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                                <br>
                                <div class="col-md-6 col-12">
                                    <select name="doctorlist" id="doctorlist" class="form-control">
                                        <option value="">Select Doctor</option>
                                    </select>
                                </div>
                                <br>
                                <div class="col-12">
                                    <textarea class="form-control" rows="5" id="message" name="message" placeholder="Additional Message"></textarea>
                                </div>
                                <br>
                                <div class="col-md-3 col-md-4 col-6 mx-auto">
                                    <button type="submit" class="form-control" name="submit" id="submit-button">Book Now</button>
                                </div>
                                    </div>
                                </form>

                    </div>
                </div>
            </div>
        </div><!-- .wrap -->

    </main><br><br><br><br><br><br><br><br>
    <!--========== END app main -->

    <!-- APP FOOTER -->
    <?php include_once('includes/footer.php'); ?>
    <!-- /#app-footer -->
    <!-- build:js assets/js/core.min.js -->
    <script src="libs/bower/jquery/dist/jquery.js"></script>
    <script src="libs/bower/jquery-ui/jquery-ui.min.js"></script>
    <script src="libs/bower/jQuery-Storage-API/jquery.storageapi.min.js"></script>
    <script src="libs/bower/bootstrap-sass/assets/javascripts/bootstrap.js"></script>
    <script src="libs/bower/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="libs/bower/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="libs/bower/PACE/pace.min.js"></script>
    <!-- endbuild -->

    <!-- build:js assets/js/app.min.js -->
    <script src="assets/js/library.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/app.js"></script>
    <!-- endbuild -->
    <script src="libs/bower/moment/moment.js"></script>
    <script src="libs/bower/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>

    <!-- JAVASCRIPT FILES -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/scrollspy.min.js"></script>
    <script src="../js/custom.js"></script>
</body>

</html>