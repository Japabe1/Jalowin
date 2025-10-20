<?php
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
?>