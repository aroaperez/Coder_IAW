<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombre_usuario']) && isset($_POST['email']) && isset($_POST['contrasena'])) {
    include('ConexionBDD.php');
    $nombre_usuario = $_POST['nombre_usuario'];
    $email = $_POST['email'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    // Insertar en la base de datos
    $query = "INSERT INTO usuarios (nombre_usuario, email, contrasena) VALUES ('$nombre_usuario', '$email', '$contrasena')";
    if ($conexion->query($query)) {
        echo "Usuario registrado exitosamente. Ahora puedes iniciar sesión.";
    } else {
        echo "Error al registrar el usuario: " . $conexion->error;
    }

    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>
    <h2>Registrarse</h2>
    <form method="POST" action="">
        <label for="nombre_usuario">Nombre de Usuario:</label><br>
        <input type="text" id="nombre_usuario" name="nombre_usuario" required><br><br>
        <label for="email">Correo Electrónico:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena" required><br><br>
        <input type="submit" value="Registrarse">
    </form>

    <p>¿Ya tienes cuenta? <a href="Sesiones.php">Inicia sesión aquí</a></p>
</body>
</html>
