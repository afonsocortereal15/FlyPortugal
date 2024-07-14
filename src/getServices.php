<?php
include("../inc/connect.inc");
function printServices($airport, $service)
{
  global $conn;
  $sql = "SELECT idAirport FROM airports WHERE iataAirport='$airport'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $airport = $row['idAirport'][0];

  if ($service == "all") {
    $sql = "SELECT * FROM services WHERE idAirport='$airport'";
  } else {
    $sql = "SELECT * FROM services WHERE idAirport='$airport' AND typeService='$service'";
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
            <img src="data:image/jpeg;base64,' . base64_encode($row['logoService']) . '" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">' . $row['nameService'] . '</h5>
              <p class="card-text">' . $row['locationService'] . '</p>
              <p class="card-text">' . $row['timeService'] . '</p>
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
    if ($counter !=0 && $counter !=4) {
      echo "</div>";
    }
  } else {
    echo "0 results";
  }
}
