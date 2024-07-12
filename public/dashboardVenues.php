<?php
include("../inc/connect.inc");
include("../src/venuesEdit.php");

session_start();
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.php');
  exit;
}
?>

<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>FlyPortugal</title>

  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- Bootstrap Icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

  <!-- Core theme CSS -->
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/dashboard-style.css">

  <!-- JS for selects -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
</head>

<body class="d-flex flex-column h-100">
  <section class="flex-shrink-0 min-vh-100" style="background-image: url('../assets/img/bg/default-bg.jpeg')">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg" style="padding-top: 20px">
      <div class="container px-5">
        <a class="navbar-brand" href="../" style="width: 200px"><img src="../assets/img/flyportugal-logo.png" width="100%" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" \ data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="bi bi-list"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="../src/logout.php">Logout</a>
            </li>
        </div>
      </div>
    </nav>
    <main class="py-2">
      <div class="container">
        <div class="row gx-5 align-items-center justify-content-center">
          <div class="col-md-12 bg-white rounded-3" style="padding: 20px;">
            <h2>Estabelecimentos</h2>
            <form action="dashboardVenues.php" method="GET">
              <!-- Venue select -->
              <select class="mb-1" id="venue" name="venue" required>
                <option value="" selected>Selecione o estabelecimento</option>
                <?php
                // Query to retrieve all types from the database
                $sql = "SELECT * FROM venues";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    // Generate options for the select dropdown
                    echo "<option value=\"" . $row["idVenue"] . "\">" . $row["nameVenue"] . "</option>";
                  }
                } else {
                  // Display a message if no users are found
                  echo "<option>SEM RESULTADOS</option>";
                }
                ?>
              </select>
              <!-- Search button -->
              <button type="submit" class="btn btn-success w-25">Selecionar</button>
            </form>
            <h4>
              <?php
              if (isset($strVenue)) {
                echo $strVenue;
                printForm($venue);
              }
              ?>
            </h4>
            <button type="button" class="btn btn-success md-2 w-25" data-bs-toggle="modal" data-bs-target="#venueModal">Criar estabelecimento</button>
          </div>
        </div>
      </div>
    </main>
  </section>
  <!-- Modal -->
  <div class="modal fade" id="venueModal" tabindex="-1" aria-labelledby="venueModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="../src/venuesCreate.php" method="POST">
          <!-- Modal header -->
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="venueModalLabel">Criar estabelecimento</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <!-- Modal Body -->
          <div class="modal-body">
            <form action="../src/venuesCreate.php" method="POST" enctype="multipart/form-data">
              <div class="input-group mb-3">
                <span class="input-group-text">Nome</span>
                <input type="text" class="form-control" name="nameVenue">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text">Localização</span>
                <input type="text" class="form-control" name="locationVenue">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text">Horário (00:00 - 00:00)</span>
                <input type="text" class="form-control" name="timeVenue">
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text">Logotipo</span>
                <input type="file" accept="image/*" class="form-control" name="logoVenue" id="logoVenue">
              </div>
              <!-- Type select -->
              <select class="mb-2" id="typeVenue" name="typeVenue" required>
                <option value="" selected>Selecione o tipo de Estabelecimento</option>
                <?php
                $sql = "SELECT * FROM venuetype";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value=\"" . $row["idType"] . "\">" . $row["nameType"] . "</option>";
                  }
                } else {
                  echo "<option>SEM RESULTADOS - CONTACTAR ADMIN</option>";
                }
                ?>
              </select>
              <!-- Airport select -->
              <select class="mb-2" id="idAirport" name="idAirport" required>
                <option value="" selected>Selecione o Aeroporto</option>
                <?php
                $sql = "SELECT * FROM airports";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value=\"" . $row["idAirport"] . "\">" . $row ["iataAirport"] . " - " . $row["nameAirport"] . "</option>";
                  }
                } else {
                  echo "<option>SEM RESULTADOS - CONTACTAR ADMIN</option>";
                }
                ?>
              </select>
            </form>

            <!-- Modal Footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-success">Criar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</body>

<script>
  $(document).ready(function() {
    $('select').selectize({
      sortField: 'text'
    });
  });
</script>

<script>
  function deleteVenue(idVenue) {
    // Send an AJAX request to the server
    fetch('../src/venuesDelete.php?idVenue=' + idVenue)
      .then(response => response.text())
      .then(data => console.log('Request successful!', data))
      .catch(error => console.error('Error:', error));
    location.href = 'dashboardVenues.php';
  }
</script>

</body>