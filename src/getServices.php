<?php
include("../inc/connect.inc");
function printServices($airport, $service) {
  global $conn;
  $sql = "SELECT idAirport FROM airports WHERE iataAirport ='$airport'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $airport = $row['idAirport'];

  switch ($service) {
    case "coffeeshops":
      $sql = "SELECT * FROM amenities WHERE idAirport= $airport AND typeAmenity=1";
      break;

    case "restaurants":
      $sql = "SELECT * FROM amenities WHERE idAirport= $airport AND typeAmenity=2";
      break;

    case "stores":
      $sql = "SELECT * FROM amenities WHERE idAirport= $airport AND typeAmenity=3";
      break;

    default:
      $sql = "SELECT * FROM amenities WHERE idAirport= $airport";
      break;
  }

  $result = mysqli_query($conn, $sql);
  $counter = 0;
  if (mysqli_num_rows($result) > 0) {
    // output data of each row in a card
    while ($row = mysqli_fetch_assoc($result)) {
      if ($counter == 0) {
        echo "<div class='row' style='padding-bottom: 10px;'>";
      }
      echo '
        <div class="col-sm-12 col-12 col-md-3 d-flex">
          <div class="card mb-4" style="width: 18rem; margin-top: 5px;">
            <img src="data:image/jpeg;base64,' . base64_encode($row['logoAmenity']) . '" class="card-img-top" alt="..." . $row["nameCoffeeShop"] . "">
            <div class="card-body">
              <h5 class="card-title">' . $row['nameAmenity'] . '</h5>
              <p class="card-text">' . $row['locationAmenity'] . '</p>
              <p class="card-text">' . $row['timeAmenity'] . '</p>
            </div>
          </div>
        </div>
        ';
      $counter++;

      if ($counter == 4) {
        echo "</div>";
        $counter = 0;
      }
    }
    if ($counter =! 4 || $counter=!0) {
      echo "</div>";
    }
  } else {
    echo "0 results";
  }


}
