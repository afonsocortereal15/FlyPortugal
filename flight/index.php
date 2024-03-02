<?php
include("../php/search.php");
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
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Bootstrap Icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

  <!-- Core theme CSS -->
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="flight-style.css">
</head>

<body class="d-flex flex-column h-100">
  <main class="flex-shrink-0 min-vh-100" style="background-image: url('<?php echo $bg_image; ?>')">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg" style="padding-top: 20px">
      <div class="container px-5">
        <a class="navbar-brand" href="../" style="width: 200px"><img src="../assets/flyportugal-logo.png" width="100%" /></a>
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
            <li></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Flight Info -->
    <section class="py-3">
      <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
          <div class="col-md-8 bg-white rounded-3">
            <div class="flight-card text-right text-xl-start">
              <div class="row">
                <div class="col align-self-center text-center">
                  <img class="airline-logo" src="<?php echo $airline_logo ?>" alt="<?php echo $airline_name; ?> Logo" title="<?php echo $airline_name; ?> Logo" width="100%">
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
                  <img src="../assets/airplane.png" width="40px" style="margin: 10px;">
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
                  <?php if ($status == "En-Route") : ?>
                    <h4>
                      <span id="flightTime" class="badge" title="Estimated Time to Arrival">
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
              <div class="row">
                <div class="col text-center align-self-center" style="padding: 12px;">
                  <p class="lead fw-normal text-dark text-center" title="Departure Terminal">
                    Terminal -
                    <?php echo $dep_terminal; ?>
                  </p>
                  <p class="lead fw-normal text-dark text-center" title="Departure Gate">
                    Gate -
                    <?php echo $dep_gate; ?>
                  </p>
                </div>
                <div class="col"></div>

                <div class="col text-center align-self-center" style="padding: 12px;">
                  <p class="lead fw-normal text-dark text-center" title="Arrival Terminal">
                    Terminal -
                    <?php echo $arr_terminal; ?>
                  </p>
                  <p class="lead fw-normal text-dark text-center" title="Arrival Baggage Belt">
                    Baggage belt -
                    <?php echo $arr_baggage; ?>
                  </p>
                </div>
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
    }
    if (seconds_left < 1800) {
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


  function arrCountdown() {
    // Set the arrival time based on the estimated or actual arrival time
    if ("<?php echo $arr_estimated; ?>" === "n/a") {
      arrTime = <?php echo $arr_time_ts; ?>;
    } else {
      arrTime = <?php echo $arr_estimated_ts; ?>;
    }

    // Calculate the current time in seconds
    const time = Date.now() / 1000;

    // Calculate the remaining time until arrival
    timeLeft = arrTime - time + 60;

    // Format the remaining time as a string (HH:MM)
    timeToArrival = new Date(timeLeft * 1000).toISOString().substring(11, 16);

    // Display the remaining time or "n/a" if the arrival time has passed
    // Also update the badge background color
    if (timeLeft < 0) {
      document.getElementById("flightTime").innerHTML = "n/a";
      document.getElementById("flightTime").classList.add('text-bg-secondary');
    } else {
      document.getElementById("flightTime").innerHTML = timeToArrival;
      document.getElementById("flightTime").classList.add('text-bg-primary');
    }
  }
</script>