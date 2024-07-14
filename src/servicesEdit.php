<?php
include("../inc/connect.inc");

if (isset($_GET["service"])) {
  $service = $_GET["service"];
  $sql = "SELECT nameService FROM services WHERE idService=$service";
  $result = $conn->query($sql);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $strService = "Editar estabelecimento: " . $rows[0]['nameService'];
}

if (isset($_POST["idService"])) {
  $idService = $_POST["idService"];
  $nameService = $_POST['nameService'];
  $locationService = $_POST['locationService'];
  $timeService = $_POST['timeService'];
  $typeService = $_POST['typeService'];
  $idAirport = $_POST['idAirport'];

  $sql = "UPDATE services SET idService=$idService, nameService='$nameService', locationService='$locationService', timeService='$timeService', typeService='$typeService', idAirport='$idAirport' WHERE idService=$idService";
  if (mysqli_query($conn, $sql)) {
    header("Location:../public/dashboardServices.php?service=" . $idService);
  } else {
    // If there was an error, display the error message
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

function printForm($service)
{
  global $conn;
  $sql = "SELECT * FROM services WHERE idService=$service";
  $result = $conn->query($sql);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $selectedType = $rows[0]["typeService"];
  $selectedAirport = $rows[0]["idAirport"];
  echo '
  <form action="../src/servicesEdit.php" method="POST">
    <div class="input-group mb-3">
      <span class="input-group-text" id="idService">ID</span>
      <input type="text" class="form-control" value="' . $rows[0]['idService'] . '" id="idService" name="idService" readonly>
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" id="nameService">Nome</span>
      <input type="text" class="form-control" value="' . $rows[0]['nameService'] . '" id="nameService" name="nameService">
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" id="nameService">Localização</span>
      <input type="text" class="form-control" value="' . $rows[0]['locationService'] . '" id="locationService" name="locationService">
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text" id="nameService">Horário</span>
      <input type="text" class="form-control" value="' . $rows[0]['timeService'] . '" id="timeService" name="timeService">
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text">Logotipo</span>
      <img src="data:image/jpeg;base64,' . base64_encode($rows[0]['logoService']) . '" class="shadow" style="width: 5%">
    </div>
    <div class="input-group mb-3">';
  $sql = "SELECT * FROM servicetype WHERE idType=$selectedType";
  $result = $conn->query($sql);
  $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
  echo '
    <!-- Type select -->
    <select class="mb-2 edit-select" id="typeService" name="typeService" required>
      <option value="' . $selectedType . '" selected>' . $rows[0]["nameType"] . '</option>
      ';
  $sql = "SELECT * FROM servicetype";
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
    
    <button type="button" class="btn btn-danger" id="delete-btn" onclick="deleteService(' . $service . ')">Apagar Estabelecimento</button>
  </form>
  ';
}

function deleteService($service)
{
  global $conn;
  echo $service;
  $sql = "DELETE FROM services WHERE idServices=$service";
  if (mysqli_query($conn, $sql)) {
    echo "apagado";
  } else {
    // If there was an error, display the error message
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
