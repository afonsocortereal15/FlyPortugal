<?php
include("../inc/connect.inc");
include("../src/flightSearch.php");
include("../src/getServices.php");
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
  <link rel="stylesheet" type="text/css" href="../assets/css/services.css">
</head>

<body class="d-flex flex-column h-100">
  <main class="flex-shrink-0 min-vh-100" style="background-image: url('<?php echo $bg_image; ?>')">
    <!-- Navabar -->
    <nav class="navbar navbar-expand-lg" style="padding-top: 20px">
      <div class="container px-5">
        <a class="navbar-brand" href="../" style="width: 200px"><img src="../assets/img/flyportugal-logo.png" width="100%" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" \ data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="bi bi-list"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="../">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <section class="py-3">
      <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
          <div class="col-md-11 col-sm-10 col-10 bg-white rounded-3" style="margin-bottom: 100px;">
            <!-- Flight Details -->
            <div class="flight-card text-right text-xl-start">
              <div class="row">
                <div class="col align-self-center text-center">
                  <img class="airline-logo" src="<?php echo $airline_logo ?>" alt="<?php echo $airline_name; ?> Logo" title="<?php echo $airline_name; ?> Logo" width="65%">
                </div>
                <div class="col align-self-center text-center">
                  <h1 class="airline-name fw-bolder text-dark" title="Airline">
                    <?php echo $airline_name; ?>
                  </h1>
                  <h5 class="flight-number fw-bolder text-dark" title="Flight IATA / ICAO">
                    <?php echo $flight_iata; ?> /
                    <?php echo $flight_icao ?>
                  </h5>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-4 text-center align-self-center" title="<?php echo $dep_name ?>">
                  <p class="lead fw-normal text-dark">
                    <?php echo $dep_city; ?> -
                    <?php echo $dep_iata; ?>
                  </p>
                </div>
                <div class="col-4 text-center align-self-center">
                  <img src="../assets/img/airplane.png" width="40px" style="margin: 10px;">
                </div>
                <div class="col-4 text-center align-self-center" title="<?php echo $arr_name ?>">
                  <p class="lead fw-normal text-dark">
                    <?php echo $arr_city; ?> -
                    <?php echo $arr_iata; ?>
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-md-4 text-center align-self-center" style="padding: 12px;">
                  <p class="lead fw-normal text-dark text-center" title="Scheduled Departure Time">
                    Time -
                    <?php echo substr($dep_time, -5); ?>
                  </p>
                  <p class="lead fw-normal text-dark text-center">
                    <?php echo $dep_status; ?>
                  </p>
                </div>
                <div class="col-12 col-md-4 text-center align-self-center">
                  <h4>
                    <span class="badge text-bg-<?php echo $status_color ?>" title="Flight Status">
                      <?php echo $status ?>
                    </span>
                  </h4>
                </div>
                <div class="col-12 col-md-4 text-center align-self-center" style="padding: 12px;">
                  <p class="lead fw-normal text-dark text-center" title="Scheduled Arrival Time">
                    Time -
                    <?php echo substr($arr_time, -5); ?>
                  </p>
                  <p class="lead fw-normal text-dark text-center">
                    <?php echo $arr_status; ?>
                  </p>
                </div>
              </div>
            </div>
            <!-- Services Category Selector -->
            <ul class="nav justify-content-start nav-pills status-selector" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active tab" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">All</button>
              </li>

              <li class="nav-item" role="presentation">
                <button class="nav-link tab" id="pills-coffeeshops-tab" data-bs-toggle="pill" data-bs-target="#pills-coffeeshops" type="button" role="tab" aria-controls="pills-coffeeshops" aria-selected="false">Coffeeshops</button>
              </li>

              <li class="nav-item" role="presentation">
                <button class="nav-link tab" id="pills-restaurants-tab" data-bs-toggle="pill" data-bs-target="#pills-restaurants" type="button" role="tab" aria-controls="pills-restaurants" aria-selected="false">Restaurants</button>
              </li>

              <li class="nav-item" role="presentation">
                <button class="nav-link tab" id="pills-stores-tab" data-bs-toggle="pill" data-bs-target="#pills-stores" type="button" role="tab" aria-controls="pills-stores" aria-selected="false">Stores</button>
              </li>

            </ul>
            <!-- Content for each pill -->
            <div class="tab-content" id="pills-tabContent">
              <!-- All Tab -->
              <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                <?php printServices($dep_iata, "all") ?>
              </div>

              <!-- Coffeeshops tab -->
              <div class="tab-pane fade" id="pills-coffeeshops" role="tabpanel" aria-labelledby="pills-coffeeshops-tab">
                <?php printServices($dep_iata, "coffeeshops") ?>
              </div>

              <!-- Restaurants tab -->
              <div class="tab-pane fade" id="pills-restaurants" role="tabpanel" aria-labelledby="pills-restaurants-tab">
                <?php printServices($dep_iata, "restaurants") ?>
              </div>

              <!-- Stores tab -->
              <div class="tab-pane fade" id="pills-stores" role="tabpanel" aria-labelledby="pills-stores-tab">
                <?php printServices($dep_iata, "stores") ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer>
    <div class="container px-5 align-content-center small m-0 text-dark">
      Copyright &copy; FlyPortugal 2024 - All rights reserved.
    </div>
  </footer>
</body>
</html>