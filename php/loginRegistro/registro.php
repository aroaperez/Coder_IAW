<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // Construir consulta segura
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($conexion->query($sql)) {
        echo "Registro realizado con éxito. <a href='index.php'>Inicia Sesión</a>";
    } else {
        echo "Error: " . $conexion->error;
    }
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>
    <h2>Registro</h2>
    <form method="POST" action="registro.php">
        <label for="username">Usuario:</label>
        <input type="text" name="username" required><br>
        <label for="email">Correo:</label>
        <input type="email" name="email" required><br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Registrarse</button>
    </form>
</body>
</html>
