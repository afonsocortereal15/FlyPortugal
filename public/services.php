<?php
include("../inc/connect.inc");
include("../src/flightSearch.php");
$sql = "SELECT * FROM coffeeshop WHERE idAirport= 1";
$result = mysqli_query($conn, $sql);
?>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>FlyPortugal</title>

  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />v

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Bootstrap Icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

  <!-- Core theme CSS -->
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/services.css">
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
    <section class="py-3">
      <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
          <div class="col-md-11 col-sm-10 col-10 bg-white rounded-3" style="margin-bottom: 100px;">


            <?php
            $counter = 0;
            if (mysqli_num_rows($result) > 0) {
              // output data of each row in a card
              while ($row = mysqli_fetch_assoc($result)) {
                if ($counter == 0) {
                  echo "<div class='row' style='padding-bottom: 10px;'>";
                }
                echo "
      <div class='col-sm-12 col-12 col-md-3 xixi d-flex'>
      <div class='card mb-4' style='width: 18rem; margin-top: 5px;'>
      <img src=" . $row["logoCoffeeShop"] . " class='card-img-top' alt='..." . $row["nameCoffeeShop"] . "'>
      <div class='card-body'>
        <h5 class='card-title'>" . $row["nameCoffeeShop"] . "</h5>
        <p class='card-text'>" . $row["locationCoffeeShop"] . "</p>
        <p class='card-text'>" . $row["timeCoffeeShop"] . "</p>
      </div>
    </div>
      </div>
    ";
                $counter++;

                if ($counter == 4) {
                  echo "</div>";
                  $counter = 0;
                }
              }
            } else {
              echo "0 results";
            }
            $conn->close();
            ?>
          </div>
        </div>
      </div>
      <style>
        .card {
          border: 1px solid #ddd;
          border-radius: 4px;
          padding: 16px;
          margin: 16px 0;
        }
      </style>
      ?>