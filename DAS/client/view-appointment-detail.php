<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['client_id'] == 0)) {
  header('location:logout.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>DAS|| View Appointment Detail</title>

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
</head>


<body class="menubar-left menubar-unfold menubar-light">
  <!--============= start main area -->
  <?php include_once('includes/header.php'); ?><br>

  <!-- APP MAIN ==========-->
  <main id="app-main" class="app-main">
    <div class="wrap">
      <div class="col-sm-12 col-12 mx-auto">
        <div class="info-box bg-white">
          <h4 class="widget-title" style="color: blue">Appointment Details</h4>

          <div class="table-responsive">
            <?php
            $cid = $_SESSION['client_id'];
            $aptid = $_GET['aptid'];

            $sql = "SELECT * FROM tblappointment WHERE client_id=:cid AND AppointmentNumber=:aptid";
            $query = $dbh->prepare($sql);
            $query->bindParam(':cid', $cid, PDO::PARAM_STR);
            $query->bindParam(':aptid', $aptid, PDO::PARAM_STR);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);

            $cnt = 1;
            if ($query->rowCount() > 0) {
              foreach ($results as $row) { ?>
                <table border="1" class="table table-bordered mg-b-0">
                  <tr>
                    <th>Appointment Number</th>
                    <td><?php echo $aptno = ($row->AppointmentNumber); ?></td>
                    <th>Patient Name</th>
                    <td><?php echo $row->Name; ?></td>
                  </tr>

                  <tr>
                    <th>Mobile Number</th>
                    <td><?php echo $row->MobileNumber; ?></td>
                    <th>Email</th>
                    <td><?php echo $row->Email; ?></td>
                  </tr>
                  <tr>
                    <th>Appointment Date</th>
                    <td><?php echo $row->AppointmentDate; ?></td>
                    <th>Appointment Time</th>
                    <td><?php echo $row->AppointmentTime; ?></td>
                  </tr>

                  <tr>
                    <th>Apply Date</th>
                    <td><?php echo $row->ApplyDate; ?></td>
                    <th>Appointment Final Status</th>

                    <td colspan="4"> <?php $status = $row->Status;

                                      if ($row->Status == "") {
                                        echo "Not yet updated";
                                      }

                                      if ($row->Status == "Approved") {
                                        echo "Your appointment has been approved";
                                      }


                                      if ($row->Status == "Cancelled") {
                                        echo "Your appointment has been cancelled";
                                      }; ?></td>
                  </tr>
                  <tr>

                    <th>Message</th>
                    <?php if ($row->Message == "") { ?>

                      <td colspan="3"><?php echo "Not Updated Yet"; ?></td>
                    <?php } else { ?> <td colspan="3"> <?php echo htmlentities($row->Message); ?>
                      </td>
                    <?php } ?>

                  </tr>

              <?php $cnt = $cnt + 1;
              }
            } ?>

                </table>
                <br>

          </div><!-- .widget-body -->

        </div><!-- END column -->


      </div><!-- .row -->
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