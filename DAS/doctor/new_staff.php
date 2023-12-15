<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_POST['submit'])) {
	$fname = $_POST['fname'];
	$mobno = $_POST['mobno'];
	$email = $_POST['email'];
	$sid = $_POST['specializationid'];
	$password = md5($_POST['password']);
	$ret = "select Email from tbldoctor where Email=:email";
	$query = $dbh->prepare($ret);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	if ($query->rowCount() == 0) {
		$sql = "Insert Into tbldoctor(FullName,MobileNumber,Email,Specialization,Password)Values(:fname,:mobno,:email,:sid,:password)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':fname', $fname, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':mobno', $mobno, PDO::PARAM_INT);
		$query->bindParam(':sid', $sid, PDO::PARAM_INT);
		$query->bindParam(':password', $password, PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if ($lastInsertId) {

			echo "<script>alert('Staff Successfully Added');</script>";
		} else {

			echo "<script>alert('Something went wrong.Please try again');</script>";
		}
	} else {

		echo "<script>alert('Email-id already exist. Please try again');</script>";
	}
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>DAS - Dashboard</title>

	<link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css">
	<!-- build:css assets/css/app.min.css -->
	<link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
	<link rel="stylesheet" href="libs/bower/fullcalendar/dist/fullcalendar.min.css">
	<link rel="stylesheet" href="libs/bower/perfect-scrollbar/css/perfect-scrollbar.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/core.css">
	<link rel="stylesheet" href="assets/css/app.css">
	<!-- endbuild -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
	<script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
	<script>
		Breakpoints();
	</script>
	<style>
		body {
			background-color: rgba(227, 228, 209, 0.916);

		}
	</style>
	<script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
	<script>
		Breakpoints();
	</script>
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">
	<!--============= start main area -->
	<?php include_once('includes/header.php'); ?>

	<?php include_once('includes/sidebar.php'); ?>
	<!-- APP MAIN ==========-->
	<main id="app-main" class="app-main">
		<div class="wrap">
			<section class="app-content">
				<div class="row">

					<div class="col-md-12">
						<div class="widget">
							<header class="widget-header">
								<h4 class="widget-title">Add New Staff Member</h4>
							</header><!-- .widget-header -->
							<hr class="widget-separator">
							<div class="widget-body">

								<form action="" method="post">
									<div class="form-group">
										<input id="fname" type="text" class="form-control" placeholder="Full Name" name="fname" required="true">
									</div>

									<div class="form-group">
										<input id="email" type="email" class="form-control" placeholder="Email" name="email" required="true">
									</div>
									<div class="form-group">
										<input id="mobno" type="text" class="form-control" placeholder="Mobile" name="mobno" maxlength="10" pattern="[0-9]+" required="true">
									</div>
									<div class="form-group">
										<select class="form-control" name="specializationid">
											<option value="">Choose Specialization</option>
											<?php
											$sql1 = "SELECT * from tblspecialization";
											$query1 = $dbh->prepare($sql1);
											$query1->execute();
											$results1 = $query1->fetchAll(PDO::FETCH_OBJ);

											$cnt = 1;
											if ($query1->rowCount() > 0) {
												foreach ($results1 as $row1) {               ?>
													<option value="<?php echo htmlentities($row1->ID); ?>"><?php echo htmlentities($row1->Specialization); ?></option><?php $cnt = $cnt + 1;
																																									}
																																								} ?>
										</select>

									</div>

									<div class="form-group">
										<input id="password" type="password" class="form-control" placeholder="Password" name="password" required="true">
									</div>

									<input type="submit" class="btn btn-primary" value="Save" name="submit">
								</form>
							</div>
						</div>
					</div>
				</div>
			</section><!-- #dash-content -->
		</div><!-- .wrap -->
		<!-- APP FOOTER -->
		<?php include_once('includes/footer.php'); ?>
		<!-- /#app-footer -->
	</main>
	<!--========== END app main -->

	<?php include_once('includes/customizer.php'); ?>



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
</body>

</html>