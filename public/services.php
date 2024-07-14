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

<body class="d-flex flex-column h-100" style="background: DarkSlateGray">
  <main class="flex-shrink-0 min-vh-100">
    <!-- Navabar -->
    <nav class="navbar navbar-expand-lg" style="padding-top: 20px">
      <div class="container px-5">
        <a class="navbar-brand" href="../" style="width: 200px"><img src="../assets/img/flyportugal-logo.png" width="100%" /></a>
      </div>
    </nav>
    <section class="py-3">
      <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
          <div class="col-md-11 col-sm-10 col-10 bg-white rounded-3 shadow" style="margin-bottom: 100px;">
            <!-- Flight Details -->
            <div class="flight-card text-right text-xl-start">
              <div class="row">
                <div class="col align-self-center text-center">
                  <img class="airline-logo" src="<?php echo $airline_logo ?>" alt="<?php echo $airline_name; ?> Logo" title="<?php echo $airline_name; ?> Logo" width="55%">
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
                  <?php if ($status == "Scheduled") : ?>
                    <h4>
                      <span id="depCountdown" class="badge" title="Time Until Departure">
                        00:00
                      </span>
                    </h4>
                  <?php endif; ?>
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
                <?php printServices($dep_iata, "1") ?>
              </div>

              <!-- Restaurants tab -->
              <div class="tab-pane fade" id="pills-restaurants" role="tabpanel" aria-labelledby="pills-restaurants-tab">
                <?php printServices($dep_iata, "2") ?>
              </div>

              <!-- Stores tab -->
              <div class="tab-pane fade" id="pills-stores" role="tabpanel" aria-labelledby="pills-stores-tab">
                <?php printServices($dep_iata, "3") ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer>
    <div class="container px-5 align-content-center small m-0 text-white">
      Copyright &copy; FlyPortugal 2024 - All rights reserved.
    </div>
  </footer>
</body>

</html>

<script>
  // Check the status of a flight and perform the corresponding action
  if ("<?php echo $status ?>" == "En-Route") {
    // If the flight is en-route, update the flight time every second
    arrCountdown();
    setInterval(arrCountdown, 1000);
  } else if ("<?php echo $status ?>" == "Scheduled") {
    // If the flight is scheduled, update the departure countdown every second
    depCountdown();
    setInterval(depCountdown, 1000);
  }

  function depCountdown() {
    // Set the departure time based on the estimated or actual departure time
    if ("<?php echo $dep_estimated; ?>" === "n/a") {
      dep_time = <?php echo $dep_time_ts; ?>;
    } else {
      dep_time = <?php echo $dep_estimated_ts; ?>;
    }

    // Calculate the current time in seconds
    const time = Date.now() / 1000;

    // Calculate the remaining seconds until departure
    seconds_left = (dep_time - time) + 60;

    // Format the remaining time as a string (HH:MM)
    time_left = new Date(seconds_left * 1000).toISOString().substring(11, 16);

    // Update the badge background color based on the remaining time
    if (seconds_left < 3600) {
      document.getElementById("depCountdown").classList.add('text-bg-warning');
    } else if (seconds_left < 1800) {
      document.getElementById("depCountdown").classList.add('text-bg-danger');
    } else {
      document.getElementById("depCountdown").classList.add('text-bg-success');
    }

    // Display the remaining time or "n/a" if the departure time has passed
    if (seconds_left < 0) {
      document.getElementById("depCountdown").innerHTML = "n/a";
    } else {
      document.getElementById("depCountdown").innerHTML = time_left;
    }
  }
</script>