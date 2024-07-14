<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>FlyPortugal</title>

  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
  <!-- Bootstrap Icons-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Core theme CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/index-style.css">
</head>

<body class="d-flex flex-column h-100">
  <main class="flex-shrink-0 min-vh-100">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg" style="padding-top: 20px">
      <div class="container px-5">
        <a class="navbar-brand" href="./" style="width: 200px"><img src="assets/img/flyportugal-logo.png" width="100%" /></a>
      </div>
    </nav>
    <!-- Main -->
    <section class="py-5">
      <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
          <div class="col-lg-8 col-xl-7 col-xxl-6">
            <div class="my-5 text-right text-xl-start">
              <h1 class="display-5 fw-bolder text-white mb-2">
                Search for your flight
              </h1>
              <p class="lead fw-normal text-white mb-4">
                Welcome to FlyPortugal, start by searching for your flight so
                we can give you the most relevant information.
              </p>
              <div class="search">
                <i class="bi bi-search"></i>
                <form action="public/main.php" method="get">
                  <input type="text" class="form-control col-sm-12 col-md-6" placeholder="Flight Number" name="flight" value="<?php if(isset($_COOKIE['flight'])) echo $_COOKIE['flight']; ?>" />
                  <button class="btn btn-primary" type="submit">Search</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer>
    <div class="container px-5 align-content-center small m-0 text-dark">
      Copyright &copy; FlyPortugal 2024 - All rights reserved.
      <a href="public/dashboard.php">Dashboard</a>
    </div>
  </footer>
</body>

</html>
