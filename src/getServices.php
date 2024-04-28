<?php
include("../inc/connect.inc");
function printServices($airport, $service) {
  global $conn;
  if ($service == "all") {
    $service = "coffeeshops, restaurants, stores";
  }

  if ($service == "coffeeshops") {
    $sql = "SELECT * FROM coffeeshops WHERE idAirport= $airport";
    $result = mysqli_query($conn, $sql);
    $counter = 0;
    if (mysqli_num_rows($result) > 0) {
      // output data of each row in a card
      while ($row = mysqli_fetch_assoc($result)) {
        if ($counter == 0) {
          echo "<div class='row' style='padding-bottom: 10px;'>";
        }
        echo "
        <div class='col-sm-12 col-12 col-md-3 d-flex'>
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
  } elseif ($service == "restaurants") {
    $sql = "SELECT * FROM restaurants WHERE idAirport= $airport";
    $result = mysqli_query($conn, $sql);
    $counter = 0;
    if (mysqli_num_rows($result) > 0) {
      // output data of each row in a card
      while ($row = mysqli_fetch_assoc($result)) {
        if ($counter == 0) {
          echo "<div class='row' style='padding-bottom: 10px;'>";
        }
        echo "
        <div class='col-sm-12 col-12 col-md-3 d-flex'>
        <div class='card mb-4' style='width: 18rem; margin-top: 5px;'>
        <img src=" . $row["logoRestaurant"] . " class='card-img-top' alt='..." . $row["nameRestaurant"] . "'>
        <div class='card-body'>
          <h5 class='card-title'>" . $row["nameRestaurant"] . "</h5>
          <p class='card-text'>" . $row["locationRestaurant"] . "</p>
          <p class='card-text'>" . $row["timeRestaurant"] . "</p>
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
  } elseif ($service == "stores") {
    $sql = "SELECT * FROM stores WHERE idAirport= $airport";
    $result = mysqli_query($conn, $sql);
    $counter = 0;
    if (mysqli_num_rows($result) > 0) {
      // output data of each row in a card
      while ($row = mysqli_fetch_assoc($result)) {
        if ($counter == 0) {
          echo "<div class='row' style='padding-bottom: 10px;'>";
        }
        echo "
        <div class='col-sm-12 col-12 col-md-3 d-flex'>
        <div class='card mb-4' style='width: 18rem; margin-top: 5px;'>
        <img src=" . $row["logoStore"] . " class='card-img-top' alt='..." . $row["nameStore"] . "'>
        <div class='card-body'>
          <h5 class='card-title'>" . $row["nameStore"] . "</h5>
          <p class='card-text'>" . $row["locationStore"] . "</p>
          <p class='card-text'>" . $row["timeStore"] . "</p>
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
  } else {
    $sql = "SELECT * FROM coffeeshops WHERE idAirport= $airport";
    $result = mysqli_query($conn, $sql);
    $counter = 0;
    if (mysqli_num_rows($result) > 0) {
      // output data of each row in a card
      while ($row = mysqli_fetch_assoc($result)) {
        if ($counter == 0) {
          echo "<div class='row' style='padding-bottom: 10px;'>";
        }
        echo "
        <div class='col-sm-12 col-12 col-md-3 d-flex'>
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
    $sql = "SELECT * FROM restaurants WHERE idAirport= $airport";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      // output data of each row in a card
      while ($row = mysqli_fetch_assoc($result)) {
        if ($counter == 0) {
          echo "<div class='row' style='padding-bottom: 10px;'>";
        }
        echo "
        <div class='col-sm-12 col-12 col-md-3 d-flex'>
        <div class='card mb-4' style='width: 18rem; margin-top: 5px;'>
        <img src=" . $row["logoRestaurant"] . " class='card-img-top' alt='..." . $row["nameRestaurant"] . "'>
        <div class='card-body'>
          <h5 class='card-title'>" . $row["nameRestaurant"] . "</h5>
          <p class='card-text'>" . $row["locationRestaurant"] . "</p>
          <p class='card-text'>" . $row["timeRestaurant"] . "</p>
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
    $sql = "SELECT * FROM stores WHERE idAirport= $airport";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      // output data of each row in a card
      while ($row = mysqli_fetch_assoc($result)) {
        if ($counter == 0) {
          echo "<div class='row' style='padding-bottom: 10px;'>";
        }
        echo "
        <div class='col-sm-12 col-12 col-md-3 d-flex'>
        <div class='card mb-4' style='width: 18rem; margin-top: 5px;'>
        <img src=" . $row["logoStore"] . " class='card-img-top' alt='..." . $row["nameStore"] . "'>
        <div class='card-body'>
          <h5 class='card-title'>" . $row["nameStore"] . "</h5>
          <p class='card-text'>" . $row["locationStore"] . "</p>
          <p class='card-text'>" . $row["timeStore"] . "</p>
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
  }
  $conn->close();
}
