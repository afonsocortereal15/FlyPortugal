<?php
include("../inc/connect.inc");

if (isset($_GET["idVenue"])) {
  $idVenue = $_GET["idVenue"];
  deleteVenue($idVenue);
}

function deleteVenue($idVenue) {
  global $conn;
  $sql ="DELETE FROM venues WHERE idVenue=$idVenue";
  if (mysqli_query($conn, $sql)) {
    echo "Estabelecimento apagado";
    header("Location:../public/dashboardVenues.php");
  } else {
    // If there was an error, display the error message
    echo "Erro!";
  }
}