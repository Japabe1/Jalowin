<?php
require_once './src/php/funciones.php';
if(isLoggedIn()){
    header('Location: home.php');
    exit();
}
$error='';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST['username']??'';
    $password=$_POST['password']??'';

    if (verifyLogin($username,$password)){
        header('Location: home.php');
        exit();
    }else {
        $error='Usuario o contraseña incorrecto';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <?php if($error): ?>
        <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Iniciar Sesión</button>
    </form>
    
    
    
</body>
</html>