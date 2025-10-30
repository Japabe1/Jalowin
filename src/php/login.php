<?php
session_start();
require_once "./funciones.php";  

$message = "";  

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (verifyLogin($username, $password)) {
        header("Location: dashboard.php");
        exit;
    } else {
        $message = "<div class='alert alert-danger'>Usuario o contraseña incorrectos.</div>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $newUser = trim($_POST["new_username"]);
    $newPass = trim($_POST["new_password"]);
    $message = "<div class='alert alert-success'>Registro exitoso, ahora puedes iniciar sesión.</div>";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login / Registro</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../../assets/style/login.css">

</head>

<body class="bg-dark d-flex justify-content-center align-items-center " style="height: 100vh;">

<div class="flip-container">
    <div class="flip-card position-relative">

        <div class="card card-face shadow-warning p-4">
            <h4 class="text-center mb-4">Iniciar Sesión</h4>

            <?= $message ?>

            <form method="POST">
                <input type="hidden" name="login">

                <div class="mb-3">
                    <label class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="username" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>

            <div class="text-center mt-3">
                <button class="btn btn-danger" id="btnShowRegister">Registrarse</button>
            </div>
        </div>

        <div class="card card-face card-back shadow p-4">
            <h4 class="text-center mb-4">Registrarse</h4>

            <form method="POST">
                <input type="hidden" name="register">

                <div class="mb-3">
                    <label class="form-label">Nuevo usuario</label>
                    <input type="text" class="form-control" name="new_username" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nueva contraseña</label>
                    <input type="password" class="form-control" name="new_password" required>
                </div>

                <button type="submit" class="btn btn-success w-100">Crear cuenta</button>
            </form>

            <div class="text-center mt-3">
                <button class="btn btn-link" id="btnShowLogin">← Volver</button>
            </div>
        </div>

    </div>
</div>



<script src="../../assets/script/login.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
