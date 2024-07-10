<?php
include("../inc/connect.inc");
include("../src/dashboardData.php");
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
  <link rel="stylesheet" type="text/css" href="../assets/css/dashboard.css">
</head>

<body class="d-flex flex-column h-100">
  <main class="flex-shrink-0 min-vh-100" style="background-image: url('../assets/img/bg/default-bg.jpeg')">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg" style="padding-top: 20px">
      <div class="container px-5">
        <a class="navbar-brand" href="../" style="width: 200px"><img src="../assets/img/flyportugal-logo.png" width="100%" /></a>
      </div>
    </nav>
    <section class="py-2">
      <div class="container">
        <div class="row gx-5 align-items-center justify-content-center">
          <div class="col-md-12 bg-white rounded-3" style="padding: 20px;">
            <div class="align-items-center justify-content-center text-center">
              <h1 class="display-2">Dashboard</h1>
            </div>
            <div class="row align-items-center justify-content-center text-center">
              <div class="col-md-4">
                <button type="button" class="btn btn-secondary"  onclick="window.location.href='airportManagement.php'">
                  <h1 class="display-5">Airports</h1>
                  <br>
                  <h3 class="display-6"><?php echo $airportsCount; ?></h3>
                </button>
              </div>
              <div class="col-md-4">
                <button type="button" class="btn btn-secondary" onclick="window.location.href='amenityManagement.php'">
                  <h1 class="display-5">Amenities</h1>
                  <br>
                  <h3 class="display-6"><?php echo $amenitiesCount; ?></h3>
                </button>
              </div>
            </div>
            <div class="row align-items-center justify-content-center text-center">
              <div class="col-md-4">
                <button type="button" class="btn btn-secondary">
                  <h1 class="display-5">Lounges</h1>
                  <br>
                  <h3 class="display-6"><?php echo $loungesCount; ?></h1>
                </button>
              </div>                                  
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>