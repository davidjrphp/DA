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

		<title>DAS || All Appointment Detail</title>

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

		<!-- Add Font Awesome for social icons -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<!-- endbuild -->
		<script src="libs/bower/breakpoints.js/dist/breakpoints.min.js"></script>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap-icons.css" rel="stylesheet">
		<link href="../css/templatemo-medic-care.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<!-- CSS only -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-b1GXoK7g3f1pjgHyvM8VcQEmTmYlrDDzi4MWdV37Pn/DxAeVZWuR68voFfnUZKxX" crossorigin="anonymous">

		<!-- JavaScript and dependencies -->
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJsxe6KZoIHeoLlq3eNxvZF83APWlsR6fiG34ov4CPLbR7Sp1XskL" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-ePpnFmkyRw3zGGh0zzg8Oz6XAF5t7Oh2W2fikUu3mZtI8Kr3qPkk3JUKHaD2hCB" crossorigin="anonymous"></script>
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

						<h4 class="widget-title">All Appointment</h4>

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
										<th>Action</th>

									</tr>
								</thead>

								<tbody>
									<?php
									$cid = $_SESSION['client_id'];
									$sql = "SELECT * from  tblappointment where client_id=:cid";
									$query = $dbh->prepare($sql);
									$query->bindParam(':cid', $cid, PDO::PARAM_STR);
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

												<td><a href="view-appointment-detail.php?editid=<?php echo htmlentities($row->ID); ?>&&aptid=<?php echo htmlentities($row->AppointmentNumber); ?>" class="btn btn-primary">View</a></td>

											</tr>
									<?php $cnt = $cnt + 1;
										}
									} ?>

								</tbody>

							</table>
						</div>
					</div><!-- .row -->
				</div><!-- .wrap -->
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
<?php }  ?>