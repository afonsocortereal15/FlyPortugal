<?php
include("../inc/connect.inc");

if (isset($_GET["idService"])) {
  $idService = $_GET["idService"];
  deleteService($idService);
}

function deleteService($idService)
{
  global $conn;
  $sql = "DELETE FROM services WHERE idService=$idService";
  if (mysqli_query($conn, $sql)) {
    echo "Estabelecimento apagado";
    header("Location:../public/dashboardServices.php");
  } else {
    // If there was an error, display the error message
    echo "Erro!";
  }
}
