<?php
include("../inc/connect.inc");
include("../src/dashboardData.php");

session_start();
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit;
}
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>FlyPortugal</title>

  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- Bootstrap Icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

  <!-- Core theme CSS -->
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/dashboard-style.css">
</head>

<body class="d-flex flex-column h-100">
  <main class="flex-shrink-0 min-vh-100" style="background-image: url('../assets/img/bg/default-bg.jpeg')">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg" style="padding-top: 20px">
      <div class="container px-5">
        <a class="navbar-brand" href="../" style="width: 200px"><img src="../assets/img/flyportugal-logo.png" width="100%" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" \ data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="bi bi-list"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="../src/logout.php">Logout</a>
            </li>
        </div>
    </nav>
    <section class="py-2">
      <div class="container">
        <div class="row gx-5 align-items-center justify-content-center">
          <div class="col-md-12 bg-white rounded-3" style="padding: 20px;">
            <div class="align-items-center justify-content-center text-center">
              <h1>Dashboard</h1>
            </div>
            <div class="row align-items-center justify-content-center text-center">
              <div class="col-md-3">
                <button type="button" class="btn btn-secondary" onclick="window.location.href='dashboardAirports.php'" style="width: 100%;">
                  <h2>Airports</h2>
                  <br>
                  <h3><?php echo $airportsCount; ?></h3>
                </button>
              </div>
              <div class="col-md-3">
                <button type="button" class="btn btn-secondary" onclick="window.location.href='dashboardServices.php'" style="width: 100%;">
                  <h2>Services</h2>
                  <br>
                  <h3><?php echo $servicesCount; ?></h3>
                </button>
              </div>
            </div>
            <!--
            <div class="row align-items-center justify-content-center text-center">
              <div class="col-md-3">
                <button type="button" class="btn btn-secondary" onclick="window.location.href='dashboardLounges.php'" style="width: 100%;">
                  <h2>Lounges</h2>
                  <br>
                  <h3><?php //echo $loungesCount; ?></h3>
                </button>
              </div>
            </div>
            -->
          </div>
        </div>
      </div>
    </section>
  </main>
</body>