<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['client_id'] == 0)) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {
    $cid = $_SESSION['client_id'];
    $cpassword = md5($_POST['currentpassword']);
    $newpassword = md5($_POST['newpassword']);
    $sql = "SELECT ID FROM clients WHERE ID=:cid and Password=:cpassword";
    $query = $dbh->prepare($sql);
    $query->bindParam(':cid', $eid, PDO::PARAM_STR);
    $query->bindParam(':cpassword', $cpassword, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
      $con = "update clients set Password=:newpassword where ID=:cid";
      $chngpwd1 = $dbh->prepare($con);
      $chngpwd1->bindParam(':cid', $cid, PDO::PARAM_STR);
      $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
      $chngpwd1->execute();

      echo '<script>alert("Your password successully changed")</script>';
    } else {
      echo '<script>alert("Your current password is wrong")</script>';
    }
  }


?>
  <!DOCTYPE html>
  <html lang="en">

  <head>

    <title>DAMS - Change Password</title>

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
        padding: 60px 0 70px 0;
        padding-right: 18rem;
        width: 90%;
        border-radius: 20px;
        margin-left: 6rem;
        margin-top: 20px;

      }
    </style>
    <script type="text/javascript">
      function checkpass() {
        if (document.changepassword.newpassword.value != document.changepassword.confirmpassword.value) {
          alert('New Password and Confirm Password field does not match');
          document.changepassword.confirmpassword.focus();
          return false;
        }
        return true;
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
              <h2 class="text-center mb-lg-3 mb-2">Change Password</h2>

              <form class="form-horizontal" onsubmit="return checkpass();" name="changepassword" method="post">
                <div class="form-group">
                  <label for="exampleTextInput1" class="col-sm-3 control-label">Current Password:</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" name="currentpassword" id="currentpassword" required='true'>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email2" class="col-sm-3 control-label">New Password:</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" name="newpassword" class="form-control" required="true">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email2" class="col-sm-3 control-label">Confirm Password:</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required='true'>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button type="submit" class="btn btn-success" name="submit">Change</button>
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
<?php }  ?>