<?php
include("../inc/connect.inc");

if (isset($_GET["idAirport"])) {
  $idAirport = $_GET["idAirport"];
  deleteAirport($idAirport);
}

function deleteAirport($idAirport) {
  global $conn;
  $sql ="DELETE FROM airports WHERE idAirport=$idAirport";
  if (mysqli_query($conn, $sql)) {
    echo "Aeroporto apagado";
    header("Location:../public/dashboardAirports.php");
  } else {
    // If there was an error, display the error message
    echo "Erro!";
  }
}