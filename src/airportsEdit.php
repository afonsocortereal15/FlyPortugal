<?php
include("../inc/connect.inc");

if (isset($_GET["airport"])) {
  $airport = $_GET["airport"];
  $sql = "SELECT nameAirport FROM airports WHERE idAirport=$airport";
  $result = $conn->query($sql);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $strAirport = "Editar aeroporto: " . $rows[0]['nameAirport'];
}

if(isset($_GET["idAirport"])) {
  $idAirport=$_GET["idAirport"];
  $nameAirport=$_GET["nameAirport"];
  $iataAirport = $_GET["iataAirport"];

  $sql = "UPDATE airports SET idAirport=$idAirport, nameAirport='$nameAirport', iataAirport='$iataAirport' WHERE idAirport=$idAirport";
  if (mysqli_query($conn, $sql)) {
    header("Location:../public/dashboardAirports.php?airport=".$idAirport);
  } else {
    // If there was an error, display the error message
    echo "Error: ". $sql. "<br>". mysqli_error($conn);
  }
}

function printForm($airport) {
  global $conn;
  $sql ="SELECT * FROM airports WHERE idAirport=$airport";
  $result = $conn->query($sql);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  echo '
  <form action="../src/airportsEdit.php" method="GET">
    <div class="input-group mb-3">
      <span class="input-group-text" id="idAirport">ID</span>
      <input type="text" class="form-control" value="'. $rows[0]['idAirport'] .'" aria-describedby="idAirport"  id="idAirport" name="idAirport" readonly>
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" id="nameAirport">Nome</span>
      <input type="text" class="form-control" value="'. $rows[0]['nameAirport'] .'" aria-describedby="nameAirport" id="nameAirport" name="nameAirport">
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" id="nameAirport">Código IATA</span>
      <input type="text" class="form-control" value="'. $rows[0]['iataAirport'] .'" aria-describedby="iataAirport" id="iataAirport" name="iataAirport">
    </div>
    <button type="submit" class="btn save-btn">Guardar</button>
    
    <button type="button" class="btn btn-danger" id="delete-btn" onclick="deleteAirport('. $airport .')">Apagar Airport</button>
  </form>
  ';
}

function deleteAirport($airport) {
  global $conn;
  echo $airport;
  $sql ="DELETE FROM airports WHERE idAirports=$airport";
  if (mysqli_query($conn, $sql)) {
    echo "apagado";
  } else {
    // If there was an error, display the error message
    echo "Error: ". $sql. "<br>". mysqli_error($conn);
  }
}