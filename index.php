<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Parallax Halloween</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-light">

<!-- PARALLAX 1 -->
<section
    class="d-flex justify-content-center align-items-center text-center text-warning"
    style="height:100vh; background-image:url('https://images.unsplash.com/photo-1509042239860-f550ce710b93'); background-size:cover; background-position:center; background-attachment:fixed;">
    <div>
        <h1 class="display-1 fw-bold">HALLOWEEN 🎃</h1>
        <p class="fs-3 mb-4">La noche del terror ha comenzado...</p>

        <!-- BOTÓN A LOGIN -->
        <a href="login.php" class="btn btn-warning btn-lg fw-bold">
            Iniciar Sesión
        </a>
    </div>
</section>

<!-- CONTENIDO -->
<section class="container py-5 text-center">
    <h2 class="fw-bold text-warning">Bienvenido a la Noche Oscura</h2>
    <p class="lead">Brujas, fantasmas y criaturas te observan desde las sombras...</p>

    <!-- SEGUNDO BOTÓN A LOGIN -->
    <a href="login.php" class="btn btn-outline-warning btn-lg">Entrar al portal secreto</a>
</section>

<!-- PARALLAX 2 -->
<section
    class="d-flex justify-content-center align-items-center text-center text-warning"
    style="height:100vh; background-image:url('https://images.unsplash.com/photo-1509315811345-47f7fa167f2d'); background-size:cover; background-position:center; background-attachment:fixed;">
    <div>
        <h1 class="display-3 fw-bold">¿Te atreves a continuar?</h1>

        <!-- TERCER BOTÓN A LOGIN -->
        <a href="login.php" class="btn btn-danger btn-lg fw-bold mt-4">
            Entrar si no tienes miedo 😱
        </a>
    </div>
</section>

<!-- CONTENIDO FINAL -->
<section class="container py-5 text-center">
    <h2 class="fw-bold text-warning">Fin del recorrido</h2>
    <p class="lead">Gracias por sobrevivir el parallax 👻</p>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
