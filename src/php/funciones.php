<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// Database connection parameters
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'halloween_db');

// Function to connect to database
function connectDB() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
// Function to verify user login
function verifyLogin($username, $password) {
    $conn = connectDB();
    $username = $conn->real_escape_string($username);
    $password = hash('sha256', $password); // Hash the password
    
    $sql = "SELECT id, username FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        return true;
    }
    return false;
}

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Funcion para crear usuarios
function createUser($username, $password) {
    $conn = connectDB();
    $username = $conn->real_escape_string($username);
    $password = hash('sha256', $password); // Hash the password

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        return true;
    }
    return false;
}
if (isset($_POST['register'])) {
    $username = $_POST['new_username'];
    $password = $_POST['new_password'];

    if (createUser($username, $password)) {
        echo "<script>alert('Usuario creado correctamente'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Error al crear el usuario'); window.location.href='register.php';</script>";
    }
}
?>