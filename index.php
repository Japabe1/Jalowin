<?php
if (isset($_POST['irALogin'])) {
    header("Location: ./src/php/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Halloween</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-black position-fixed w-100" style="z-index: 999;">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-warning" href="#">🎃 Halloween</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="menu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link text-warning" href="#inicio">Inicio</a></li>
        <li class="nav-item"><a class="nav-link text-warning" href="#seccion1">Historia</a></li>
        <li class="nav-item"><a class="nav-link text-warning" href="#seccion2">Terror</a></li>
      </ul>

      <form method="POST">
        <button type="submit" name="irALogin" class="btn btn-warning ms-3 fw-bold">
          Login
        </button>
      </form>
    </div>
  </div>
</nav>

<section id="inicio"
    class="d-flex justify-content-center align-items-center text-center text-warning"
    style="height:100vh; background-image:url('https://images.unsplash.com/photo-1509042239860-f550ce710b93'); background-size:cover; background-position:center; background-attachment:fixed;">
    <div>
        <h1 class="display-1 fw-bold">HALLOWEEN 🎃</h1>
        <p class="fs-3 mb-4">La noche del terror ha comenzado...</p>

        <form method="POST">
            <button type="submit" name="irALogin" class="btn btn-warning btn-lg fw-bold">
                Iniciar Sesión
            </button>
        </form>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
