<?php
include("../inc/connect.inc");

if (isset($_GET["idLounge"])) {
  $idLounge = $_GET["idLounge"];
  deleteLounge($idLounge);
}

function deleteLounge($idLounge) {
  global $conn;
  $sql ="DELETE FROM lounges WHERE idLounge=$idLounge";
  if (mysqli_query($conn, $sql)) {
    echo "Lounge apagado";
    header("Location:../public/dashboardLounges.php");
  } else {
    // If there was an error, display the error message
    echo "Erro!";
  }
}