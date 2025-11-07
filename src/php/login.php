<?php
session_start();
require_once "./funciones.php";  

$message_login = "";
$message_register = "";

// LOGIN
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (verifyLogin($username, $password)) {
        header("Location: ../../home.php");
        exit;
    } else {
        $message_login = "<div class='alert alert-danger text-center'>Usuario o contraseña incorrectos.</div>";
    }
}

// REGISTRO
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    $newUser = trim($_POST["new_username"]);
    $newPass = trim($_POST["new_password"]);

    if (createUser($newUser, $newPass)) {
        $message_register = "<div class='alert alert-success text-center'>Usuario creado correctamente. Ahora puedes iniciar sesión.</div>";
    } else {
        $message_register = "<div class='alert alert-danger text-center'>Error al crear el usuario. Inténtalo de nuevo.</div>";
    }
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

<body class="bg-dark d-flex justify-content-center align-items-center" style="height: 100vh;">

<div class="flip-container">
    <div class="flip-card position-relative">

        <!-- FORMULARIO LOGIN -->
        <div class="card card-face shadow-warning p-4">
            <h4 class="text-center mb-4">Iniciar Sesión</h4>

            <?= $message_login ?>

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

        <!-- FORMULARIO REGISTRO -->
        <div class="card card-face card-back shadow p-4">
            <h4 class="text-center mb-4">Registrarse</h4>

            <?= $message_register ?>

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
