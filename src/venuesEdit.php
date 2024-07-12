<?php
include("../inc/connect.inc");

if (isset($_GET["venue"])) {
  $venue = $_GET["venue"];
  $sql = "SELECT nameVenue FROM venues WHERE idVenue=$venue";
  $result = $conn->query($sql);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $strVenue = "Editar estabelecimento: " . $rows[0]['nameVenue'];
}

if (isset($_POST["idVenue"])) {
  $idVenue = $_POST["idVenue"];
  $nameVenue = $_POST['nameVenue'];
  $locationVenue = $_POST['locationVenue'];
  $timeVenue = $_POST['timeVenue'];
  $typeVenue = $_POST['typeVenue'];
  $idAirport = $_POST['idAirport'];

  $sql = "UPDATE venues SET idVenue=$idVenue, nameVenue='$nameVenue', locationVenue='$locationVenue', timeVenue='$timeVenue', typeVenue='$typeVenue', idAirport='$idAirport' WHERE idVenue=$idVenue";
  if (mysqli_query($conn, $sql)) {
    header("Location:../public/dashboardVenues.php?venue=" . $idVenue);
  } else {
    // If there was an error, display the error message
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

function printForm($venue)
{
  global $conn;
  $sql = "SELECT * FROM venues WHERE idVenue=$venue";
  $result = $conn->query($sql);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $selectedType = $rows[0]["typeVenue"];
  $selectedAirport = $rows[0]["idAirport"];
  echo '
  <form action="../src/venuesEdit.php" method="POST">
    <div class="input-group mb-3">
      <span class="input-group-text" id="idVenue">ID</span>
      <input type="text" class="form-control" value="' . $rows[0]['idVenue'] . '" id="idVenue" name="idVenue" readonly>
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" id="nameVenue">Nome</span>
      <input type="text" class="form-control" value="' . $rows[0]['nameVenue'] . '" id="nameVenue" name="nameVenue">
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" id="nameVenue">Localização</span>
      <input type="text" class="form-control" value="' . $rows[0]['locationVenue'] . '" id="locationVenue" name="locationVenue">
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" id="nameVenue">Horário</span>
      <input type="text" class="form-control" value="' . $rows[0]['timeVenue'] . '" id="timeVenue" name="timeVenue">
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text">Logotipo</span>
      <img src="data:image/jpeg;base64,' . base64_encode($rows[0]['logoVenue']) . '" class="shadow" style="width: 5%">
    </div>
    <div class="input-group mb-3">';
    $sql = "SELECT * FROM venuetype WHERE idType=$selectedType";
    $result = $conn->query($sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo '
    <!-- Type select -->
    <select class="mb-2 edit-select" id="typeVenue" name="typeVenue" required>
      <option value="'. $selectedType .'" selected>'. $rows[0]["nameType"] .'</option>
      '; 
      $sql = "SELECT * FROM venuetype";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<option value=\"" . $row["idType"] . "\">" . $row["nameType"] . "</option>";
        }
      } else {
        echo "<option>SEM RESULTADOS - CONTACTAR ADMIN</option>";
      }  
      echo '
      </select>
      </div>
      <div class="input-group mb-3"> ';
      $sql = "SELECT * FROM airports WHERE idAirport=$selectedAirport";
      $result = $conn->query($sql);
      $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
      echo '
      <!-- Airport select -->
      <select class="mb-2 edit-select" id="idAirport" name="idAirport" required>
        <option value="'. $selectedAirport .'" selected>'. $rows[0]["nameAirport"] .'</option>
        '; 
        $sql = "SELECT * FROM airports";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<option value=\"" . $row["idAirport"] . "\">" . $row ["iataAirport"] . " - " . $row["nameAirport"] . "</option>";
          }
        } else {
          echo "<option>SEM RESULTADOS - CONTACTAR ADMIN</option>";
        }
        echo '
      </select>
      </div>
    <button type="submit" class="btn btn-success">Guardar</button>
    
    <button type="button" class="btn btn-danger" id="delete-btn" onclick="deleteVenue(' . $venue . ')">Apagar Estabelecimento</button>
  </form>
  ';
}

function deleteVenue($venue)
{
  global $conn;
  echo $venue;
  $sql = "DELETE FROM venues WHERE idVenues=$venue";
  if (mysqli_query($conn, $sql)) {
    echo "apagado";
  } else {
    // If there was an error, display the error message
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
