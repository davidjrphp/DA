<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['client_id'] == 0)) {
	header('location:logout.php');
} else {



?>
	<!DOCTYPE html>
	<html lang="en">

	<head>

		<title>DAS - Dashboard</title>

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

			/* Styles for widget cards */
			.widget {
				background-color: #fff;
				border: 1px solid #e7e7e7;
				border-radius: 20px;
				padding: 20px;
				margin-left: 2rem;
				margin-bottom: 20px;
				box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
			}

			.widget-title {
				font-size: 24px;
				margin: 0;
				color: #333;
			}

			.widget-body {
				display: flex;
				justify-content: space-between;
				align-items: center;
			}

			.counter {
				font-size: 36px;
				font-weight: bold;
				color: #333;
			}

			.text-color {
				color: white;
			}

			.big-icon {
				font-size: 48px;
				color: #888;
			}

			.widget-footer {
				padding-top: 10px;
				border-top: 1px solid #e7e7e7;
			}

			.widget-footer a {
				color: white;
				text-decoration: none;
			}

			.small-chart {
				display: inline-block;
				width: 50px;
				height: 30px;
				margin-left: 10px;
			}
		</style>
	</head>

	<body class="menubar-left menubar-unfold menubar-light theme-primary">
		<!--============= start main area -->
		<?php include_once('includes/header.php'); ?><br>
		<!-- APP MAIN ==========-->
		<main id="app-main" class="app-main">
			<div class="wrap">
				<section class="app-content">
					<div class="row">

						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="widget stats-widget">
									<div class="widget-body clearfix">
										<?php
										$cid = $_SESSION['client_id'];;
										$sql = "SELECT * from  tblappointment where Status='Approved' && client_id=:cid ";
										$query = $dbh->prepare($sql);
										$query->bindParam(':cid', $cid, PDO::PARAM_STR);
										$query->execute();
										$results = $query->fetchAll(PDO::FETCH_OBJ);
										$totappapt = $query->rowCount();
										?>
										<div class="pull-left">
											<h3 class="widget-title text-success"><span class="counter" data-plugin="counterUp"><?php echo htmlentities($totappapt); ?></span></h3>
											<small class="text-color">Total Approved</small>
										</div>
										<span class="pull-right big-icon watermark"><i class="fa fa-ban"></i></span>
									</div>
									<footer class="widget-footer bg-success">
										<a href="approved-appointment.php"><small style="color: white"> View Detail</small></a>
										<span class="small-chart pull-right" data-plugin="sparkline" data-options="[1,2,3,5,4], { type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
									</footer>
								</div><!-- .widget -->
							</div>

							<div class="col-md-6 col-sm-6">
								<div class="widget stats-widget">
									<div class="widget-body clearfix">

										<div class="pull-left">
											<?php
											$cid = $_SESSION['client_id'];;
											$sql = "SELECT * from  tblappointment where client_id=:cid ";
											$query = $dbh->prepare($sql);
											$query->bindParam(':cid', $cid, PDO::PARAM_STR);
											$query->execute();
											$results = $query->fetchAll(PDO::FETCH_OBJ);
											$totapt = $query->rowCount();
											?>
											<h3 class="widget-title text-primary"><span class="counter" data-plugin="counterUp"><?php echo htmlentities($totapt); ?></span></h3>
											<small class="text-color">Total Appointment</small>
										</div>
										<span class="pull-right big-icon watermark"><i class="fa fa-file-text-o"></i></span>
									</div>
									<footer class="widget-footer bg-primary">
										<a href="all-appointment.php"><small style="color: white"> View Detail</small></a>
										<span class="small-chart pull-right" data-plugin="sparkline" data-options="[5,4,3,5,2],{ type: 'bar', barColor: '#ffffff', barWidth: 5, barSpacing: 2 }"></span>
									</footer>
								</div><!-- .widget -->
							</div>
						</div><!-- .row -->

						<div class="row">

				</section><!-- #dash-content -->
			</div><!-- .wrap -->

		</main>
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