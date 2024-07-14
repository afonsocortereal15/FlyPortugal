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
  <link rel="stylesheet" type="text/css" href="../assets/css/xx.css">
</head>

<body class="d-flex flex-column h-100">
  <main class="flex-shrink-0 min-vh-100" style="background-image: url('../assets/img/bg/default-bg.jpeg')">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg" style="padding-top: 20px">
      <div class="container px-5">
        <a class="navbar-brand" href="../" style="width: 200px"><img src="../assets/img/flyportugal-logo.png" width="100%" /></a>
      </div>
    </nav>
    <section class="py-2">
      <div class="container">
        <div class="row gx-5 align-items-center justify-content-center">
          <div class="col-md-4 bg-white rounded-3 align-content-center text-center" style="padding: 20px;">
            <form action="../src/authenticate.php" method="post">
              <h2>Login</h2>
              <img src="../assets/img/flyportugal-logo-black.png" width="50%">
              <p></p>
              <!-- Email input -->
              <div class="input-group">
                <span class="input-group-text">Username</span>
                <input type="text" class="form-control" name="username" id="username">
              </div>

              <!-- Password input -->
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Password</span>
                <input type="text" class="form-control" name="password" id="password">
              </div>

              <!-- 2 column grid layout for inline styling -->
              <div class="row mb-4">
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-success btn-block mb-4">Entrar</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>