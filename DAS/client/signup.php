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
		$sql = "Insert Into clients(FullName,MobileNumber,Email,Password)Values(:fname,:mobno,:email,:sid,:password)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':fname', $fname, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':mobno', $mobno, PDO::PARAM_INT);
		$query->bindParam(':sid', $sid, PDO::PARAM_INT);
		$query->bindParam(':password', $password, PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if ($lastInsertId) {

			echo "<script>alert('You have signup  Successfully');</script>";
		} else {

			echo "<script>alert('Something went wrong.Please try again');</script>";
		}
	} else {

		echo "<script>alert('Email-id already exist. Please try again');</script>";
	}
}


?>
<!doctype html>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>DAS - Login Page</title>

	<link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/core.css">
	<link rel="stylesheet" href="assets/css/misc-pages.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">
</head>
<style>
	body {
		background-image: url("images/hospital2.jpg");
		background-size: cover;
		background-repeat: no-repeat;
		backdrop-filter: brightness(0.5);
	}

	.simple-page-logo {
		text-shadow: 6px 4px 7px black;
		font-size: 2.0em;
		color: #fff4f4 !important;
		/* background: #8080801c; */

	}
</style>

<body class="simple-page">
	<div id="back-to-home">
		<a href="../index.php" class="btn btn-outline btn-default"><i class="fa fa-home animated zoomIn"></i></a>
	</div>
	<div class="simple-page-wrap">
		<div class="simple-page-logo animated swing">

			<span style="color: white"><i class="fa fa-gg"></i></span>
			<span style="color: white">Doctor's Appointment System</span>

		</div><!-- logo -->
		<div class="simple-page-form animated flipInY" id="login-form">
			<h4 class="form-title m-b-xl text-center">Sign Up With Your DAS Account</h4>
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
					<input id="password" type="password" class="form-control" placeholder="Password" name="password" required="true">
				</div>

				<input type="submit" class="btn btn-primary" value="Register" name="submit">
			</form>
		</div><!-- #login-form -->

		<div class="simple-page-footer">
			<p>
				<small>Already have an account ?</small>
				<a href="login.php">Login IN</a>
			</p>
		</div>
	</div><!-- .simple-page-wrap -->
</body>

</html>