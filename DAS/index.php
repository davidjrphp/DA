<?php
session_start();
//error_reporting(0);
include('doctor/includes/dbconnection.php');
?>
<!doctype html>
<html lang="en">

<head>
    <title>Doctor Appointment System || Home Page</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0-beta2/css/bootstrap.min.css">

    <link rel="stylesheet" href="libs/bower/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="libs/bower/animate.css/animate.min.css">
    <link rel="stylesheet" href="doctor/assets/css/bootstrap.css">
    <link rel="stylesheet" href="doctor/assets/css/core.css">
    <link rel="stylesheet" href="doctor/assets/css/misc-pages.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300">


    <!-- Add Font Awesome for social icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/owl.carousel.min.css" rel="stylesheet">

    <link href="css/owl.theme.default.min.css" rel="stylesheet">

    <link href="css/templatemo-medic-care.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Include Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0-beta2/js/bootstrap.bundle.min.js"></script>
    <style>
        .info-box {
            color: #444444;
            text-align: center;
            box-shadow: 0 0 30px rgba(214, 215, 216, 0.6);
            padding: 20px 10px 30px 12px;
            width: 750px;
            border-radius: 20px;
            margin-top: 20px
        }

        /*-------------------------------------
        3.  Welcome-hero
--------------------------------------*/
        .welcome-hero {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            background: url("images/slider/University_Teaching_Hospital.jpg")no-repeat;
            background-size: cover;
            background-position: center;
            background-color: #022702;
            height: 700px;
            margin-top: 0;
            padding-top: 100px
        }

        .welcome-hero:before {
            position: absolute;
            content: " ";
            top: 0;
            left: 0;
            background: rgba(31, 44, 108, .65);
            width: 100%;
            height: 100%;
        }

        /*.header-text-area*/
        .header-text h2 {
            color: #fff;
            font-size: 54px;
            font-weight: 700;
            text-transform: uppercase;
            line-height: 1.5;
        }

        .header-text h2 span {
            color: #fff;
        }

        .header-text p {
            color: #fff;
            font-size: 20px;
            font-weight: 300;
            text-transform: uppercase;
            margin: 30px 0 60px;
            letter-spacing: 1px;
        }

        /* Social Icons Style */
        .social-icons {
            margin-top: 20px;

            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .social-icon {
            font-size: 24px;
            margin-right: 15px;
            color: #ff4db1;
            width: 50px;
            height: 50px;
            line-height: 50px;
            border-radius: 50%;
        }

        .social-icon a {
            margin: 0 15px;
            font-size: 24px;
            transition: color 0.3s ease;
        }

        .info-box2 {
            color: #444444;
            text-align: center;
            box-shadow: 0 0 30px rgba(214, 215, 216, 0.6);
            padding: 60px 0 70px 0;
            width: 100%;
            border-radius: 20px;
        }

        .myButton {
            border-radius: 20px;
        }

        /* Media queries for mobile phones */
        @media (max-width: 768px) {}
    </style>
    <script>
        function getdoctors(val) {
            //  alert(val);
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

<body id="top">

    <main>
        <?php include_once('includes/header.php'); ?>
        <!--welcome-hero start -->
        <section id="welcome-hero" class="welcome-hero">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="header-text">
                            <h2>Welcome to <br>Doctor's Appointment System<span>.</span> </h2>
                            <p>Your Convenient Online Doctor <br><span>24/7 any time, any where</span></p>
                            <div class="col-sm">
                                <button class="btn btn-info myButton">
                                    <a class="nav-link text-white" style="font-size: 20px" href="#client"> Book Appointment</a>
                                </button>
                            </div>
                            <!-- Social Icons -->
                            <div class="social-icons">
                                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="social-icon"><i class="fab fa-whatsapp"></i></a>
                                <a href="#" class="social-icon"><i class="bi-envelope"></i></a>
                            </div>
                        </div><!--/.header-text-->
                    </div><!--/.col-->
                </div><!-- /.row-->
            </div><!-- /.container-->
        </section>

        <!--welcome-hero end -->

        <section class="section-padding" id="about">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="info-box">
                            <?php
                            $sql = "SELECT * from tblpage where PageType='aboutus'";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);

                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $row) {               ?>
                                    <h2 class="mb-lg-3 mb-3"><?php echo htmlentities($row->PageTitle); ?></h2>

                                    <p><?php echo ($row->PageDescription); ?>.</p>

                            <?php $cnt = $cnt + 1;
                                }
                            } ?>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-5 col-12 mx-auto">
                        <div class="featured-circle bg-white  shadow-lg d-flex justify-content-center align-items-center">
                            <p class="featured-text "><span class="featured-number ">DAS</span> </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="section-padding" id="client">
            <?php
            error_reporting(0);
            include('client/includes/dbconnection.php');

            if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $password = md5($_POST['password']);
                $sql = "SELECT ID,Email FROM clients WHERE Email=:email and Password=:password";
                $query = $dbh->prepare($sql);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->bindParam(':password', $password, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if ($query->rowCount() > 0) {
                    foreach ($results as $result) {
                        $_SESSION['client_id'] = $result->ID;
                        $_SESSION['clientemailid'] = $result->Email;
                    }
                    $_SESSION['login'] = $_POST['email'];
                    echo "<script type='text/javascript'> document.location ='client/dashboard.php'; </script>";
                } else {
                    echo "<script>alert('Invalid Details');</script>";
                }
            }

            ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 mx-auto">
                        <div class="info-box2">

                            <style>
                                .simple-page-logo {
                                    text-shadow: 6px 4px 7px black;
                                    font-size: 2.0em;
                                    color: #fff4f4 !important;
                                    /* background: #8080801c; */

                                }
                            </style>
                            <div class="simple-page-wrap">
                                <div class="simple-page-logo animated swing">

                                    <span style="color: white"><i class="fa fa-gg"></i></span>
                                    <span style="color: #2a3645;"><b>Doctor's Appointment System</b></span>

                                </div><!-- logo -->
                                <div class="simple-page-form animated flipInY" id="login-form">
                                    <h4 class="form-title m-b-xl text-center">Client's Login</h4>
                                    <form method="post" name="login">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter Registered Email ID" required="true" name="email">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password" name="password" required="true">
                                        </div>


                                        <input type="submit" class="btn btn-primary" name="login" value="Login">
                                    </form>
                                    <hr />
                                    <a href="#signUn">Signup/Registration</a>
                                </div><!-- #login-form -->

                                <div class="simple-page-footer">
                                    <p style="color: blue"><a href="forgot-password.php">FORGOT YOUR PASSWORD ?</a></p>

                                </div><!-- .simple-page-footer -->
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <section class="section-padding" id="signUn">
            <?php
            session_start();
            error_reporting(0);
            include('client/includes/dbconnection.php');
            if (isset($_POST['submit'])) {
                $fname = $_POST['fname'];
                $mobno = $_POST['mobno'];
                $email = $_POST['email'];
                $password = md5($_POST['password']);
                $ret = "select Email from clients where Email=:email";
                $query = $dbh->prepare($ret);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                if ($query->rowCount() == 0) {
                    $sql = "Insert Into clients(FullName,MobileNumber,Email,Password)Values(:fname,:mobno,:email,:password)";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
                    $query->bindParam(':email', $email, PDO::PARAM_STR);
                    $query->bindParam(':mobno', $mobno, PDO::PARAM_INT);
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
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 mx-auto">
                        <div class="info-box2">
                            <div class="simple-page-wrap">
                                <div class="simple-page-logo animated swing">

                                    <span style="color: white"><i class="fa fa-gg"></i></span>
                                    <span style="color: #2a3645;"><b>Doctor's Appointment System</b></span>

                                </div><!-- logo -->
                                <div class="simple-page-form animated flipInY" id="login-form">
                                    <h4 class="form-title m-b-xl text-center">Sign Up</h4>
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
                                    <p style="color: black">
                                        <small style="color: black;">Already have an account ?</small>
                                        <a style="color: black;" href="#client">Login IN</a>
                                    </p>
                                </div>
                            </div><!-- .simple-page-wrap -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php include_once('includes/footer.php'); ?>
    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/scrollspy.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>