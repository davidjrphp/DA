<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');

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
    <style>
        body {
            background-color: rgba(227, 228, 209, 0.916);

        }

        .info-box {
            color: #444444;
            text-align: center;
            box-shadow: 0 0 30px rgba(214, 215, 216, 0.6);
            padding: 60px 0 70px 0;
            width: 100%;
            border-radius: 20px;
            margin-top: 100px;

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
                        <h4 class="text-center mb-lg-3 mb-2">Search Appointment History by Appointment Number/Name/Mobile No</h4>

                        <form role="form" method="post">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Appointment No./Name/Mobile No.">
                                </div>

                                <div class="col-lg-3 col-md-4 col-6 mx-auto">
                                    <button type="submit" class="form-control" name="search" id="submit-button">Check</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <?php
                    if (isset($_POST['search'])) {

                        $sdata = $_POST['searchdata'];
                    ?>
                        <h4 align="center">Result against "<?php echo $sdata; ?>" keyword </h4>

                        <div class="widget-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover js-basic-example dataTable table-custom">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Appointment Number</th>
                                            <th>Patient Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Remark</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php

                                        $sql = "SELECT * from tblappointment where AppointmentNumber like '$sdata%' || Name like '$sdata%' || MobileNumber like '$sdata%'";
                                        $query = $dbh->prepare($sql);
                                        $query->execute();
                                        $results = $query->fetchAll(PDO::FETCH_OBJ);

                                        $cnt = 1;
                                        if ($query->rowCount() > 0) {
                                            foreach ($results as $row) {               ?>
                                                <tr>
                                                    <td><?php echo htmlentities($cnt); ?></td>
                                                    <td><?php echo htmlentities($row->AppointmentNumber); ?></td>
                                                    <td><?php echo htmlentities($row->Name); ?></td>
                                                    <td><?php echo htmlentities($row->MobileNumber); ?></td>
                                                    <td><?php echo htmlentities($row->Email); ?></td>
                                                    <?php if ($row->Status == "") { ?>

                                                        <td><?php echo "Not Updated Yet"; ?></td>
                                                    <?php } else { ?> <td><?php echo htmlentities($row->Status); ?>
                                                        </td>
                                                    <?php } ?>

                                                    <?php if ($row->Remark == "") { ?>

                                                        <td><?php echo "Not Updated Yet"; ?></td>
                                                    <?php } else { ?> <td><?php echo htmlentities($row->Remark); ?>
                                                        </td>
                                                    <?php } ?>

                                                </tr>
                                    </tbody>

                                <?php
                                                $cnt = $cnt + 1;
                                            }
                                        } else { ?>
                                <tr>
                                    <td colspan="8"> No record found against this search</td>

                                </tr>
                        <?php }
                                    } ?>
                                </table>
                            </div>

                        </div>
                </div>
            </div>
        </div>
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