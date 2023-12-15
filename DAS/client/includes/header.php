<style>
  .navbar {
    /* background-color: #022702; */
    background-color: #2a3645;
    position: fixed;
  }

  li a:hover {
    background-color: #111;
  }

  .logo,
  .featured-circle {
    margin-right: 430px;
  }

  /* Add animation styles for dropdown here */
  .dropdown:hover .dropdown-menu {
    display: block;
    animation: fadeInUp 0.3s ease-in-out;
  }

  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translate3d(0, 10%, 0);
    }

    to {
      opacity: 1;
      transform: none;
    }
  }
</style>

<nav class="navbar navbar-expand-lg fixed-top shadow-lg">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <div class="system-logo logo">

      <span class="featured-circle bg-info shadow-lg d-flex justify-content-center align-items-center bg-primary text-blue font-weight-500" style="width: 70px;height:70px;">
        <p class="featured-text">DAS </p>
      </span>
    </div>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" style="font-size: 20px" href="dashboard.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" style="font-size: 20px" href="#">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" style="font-size: 20px" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Appointment
        </a>
        <div class="dropdown-menu animated flipInY" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="book_appointment.php">Book Appointment</a>
          <a class="dropdown-item" href="check-appointment.php">Check Appointment</a>
          <a class="dropdown-item" href="approved-appointment.php">Approved Appointment</a>
          <a class="dropdown-item" href="all-appointment.php">All Appointments</a>
        </div>
      </li>
      &nbsp;&nbsp;
      <!-- <ul class="nav navbar-toolbar navbar-toolbar-right navbar-right"> -->
      <li class="nav-item dropdown">
        <a href="javascript:void(0)" class="nav-link dropdown-toggle text-white" style="font-size: 20px" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Account</a>
        <ul class="dropdown-menu animated flipInY">
          <li><a href="profile.php"><i class="zmdi m-r-md zmdi-hc-lg zmdi-account-box"></i>My Profile</a></li>
          <li><a href="change-password.php"><i class="zmdi m-r-md zmdi-hc-lg zmdi-balance-wallet"></i>Change Password</a></li>
          <li><a href="logout.php"><i class="zmdi m-r-md zmdi-hc-lg zmdi-sign-in"></i>Logout</a></li>

        </ul>
      </li>

    </ul>
  </div><!-- navbar-container -->
</nav>