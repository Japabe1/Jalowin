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
    
    
</body>
</html>