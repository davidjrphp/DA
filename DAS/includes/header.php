

<style>
    .navbar {
        background-color: #2a3645;
    }

    li a:hover {
        background-color: #111;
    }

    .logo,
    .featured-circle {
        margin-right: 500px;
    }
</style>

<nav class="navbar navbar-expand-lg fixed-top shadow-lg">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse" id="navbarNav">
        <div class="system-logo logo">
            <span class="featured-circle bg-info shadow-lg d-flex justify-content-center align-items-center bg-primary text-blue font-weight-500" style="width: 70px; height: 70px;">
                <p class="featured-text">DAS</p>
            </span>
        </div>
        <ul class="navbar-nav mx-auto navBar">
            <li class="nav-item active">
                <a class="nav-link text-white" style="font-size: 20px" href="#welcome-hero">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" style="font-size: 20px" href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" style="font-size: 20px" href="#contact">Contact</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-white" style="font-size: 20px" href="doctor/login.php">Doctor</a>
            </li>
        </ul>
    </div>
</nav>