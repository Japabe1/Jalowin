<?php
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }
// require_once "./src/php/funciones.php"; 
// if (!isLoggedIn()) {
//     header("Location: ./src/php/login.php");
//     exit;
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>HOME</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Bienvenido</h1>
                <p class="card-text">Has iniciado sesión correctamente.</p>
                <a href="./src/php/logout.php" class="btn btn-danger">Cerrar Sesión</a>
            </div>
        </div>
    </div>  
    
</body>
</html>
<?php