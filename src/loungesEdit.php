<?php
include("../inc/connect.inc");

if (isset($_GET["lounge"])) {
  $lounge = $_GET["lounge"];
  $sql = "SELECT nameLounge FROM lounges WHERE idLounge=$lounge";
  $result = $conn->query($sql);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $strLounge = "Editar lounge: " . $rows[0]['nameLounge'];
}

if (isset($_GET["idLounge"])) {
  $idLounge = $_GET["idLounge"];
  $nameLounge = $_GET["nameLounge"];
  $locationLounge = $_GET["locationLounge"];
  $descriptionLounge = $_GET["descriptionLounge"];
  $idAirport = $_GET["idAirport"];

  $sql = "UPDATE lounges SET idLounge=$idLounge, nameLounge='$nameLounge', locationLounge='$locationLounge', descriptionLounge='$descriptionLounge', idAirport='$idAirport' WHERE idLounge=$idLounge";
  if (mysqli_query($conn, $sql)) {
    header("Location:../public/dashboardLounges.php?lounge=" . $idLounge);
  } else {
    // If there was an error, display the error message
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

function printForm($lounge)
{
  global $conn;
  $sql = "SELECT * FROM lounges WHERE idLounge=$lounge";
  $result = $conn->query($sql);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $selectedAirport = $rows[0]["idAirport"];
  echo '
  <form action="../src/loungesEdit.php" method="GET">
    <div class="input-group mb-3">
      <span class="input-group-text" id="idLounge">ID</span>
      <input type="text" class="form-control" value="' . $rows[0]['idLounge'] . '" aria-describedby="idLounge"  id="idLounge" name="idLounge" readonly>
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" id="nameLounge">Nome</span>
      <input type="text" class="form-control" value="' . $rows[0]['nameLounge'] . '" aria-describedby="nameLounge" id="nameLounge" name="nameLounge">
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" id="nameLounge">Localização</span>
      <input type="text" class="form-control" value="' . $rows[0]['locationLounge'] . '" aria-describedby="locationLounge" id="locationLounge" name="locationLounge">
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" id="nameLounge">Horário</span>
      <input type="text" class="form-control" value="' . $rows[0]['timeLounge'] . '" aria-describedby="timeLounge" id="timeLounge" name="timeLounge">
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text">Descrição</span>
      <textarea class="form-control" name="descriptionLounge">' . $rows[0]['descriptionLounge'] . '</textarea>
    </div>
    <div class="input-group mb-3"> ';
  $sql = "SELECT * FROM airports WHERE idAirport=$selectedAirport";
  $result = $conn->query($sql);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  echo '
      <!-- Airport select -->
      <select class="mb-2 edit-select" id="idAirport" name="idAirport" required>
        <option value="' . $selectedAirport . '" selected>' . $rows[0]["nameAirport"] . '</option>
        ';
  $sql = "SELECT * FROM airports";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "<option value=\"" . $row["idAirport"] . "\">" . $row["iataAirport"] . " - " . $row["nameAirport"] . "</option>";
    }
  } else {
    echo "<option>SEM RESULTADOS - CONTACTAR ADMIN</option>";
  }
  echo '
      </select>
      </div>
    <button type="submit" class="btn btn-success">Guardar</button>
    
    <button type="button" class="btn btn-danger" id="delete-btn" onclick="deleteLounge(' . $lounge . ')">Apagar Lounge</button>
  </form>
  ';
}

function deleteLounge($lounge)
{
  global $conn;
  echo $lounge;
  $sql = "DELETE FROM lounges WHERE idLounges=$lounge";
  if (mysqli_query($conn, $sql)) {
    echo "apagado";
  } else {
    // If there was an error, display the error message
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
