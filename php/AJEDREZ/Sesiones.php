<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// // Si ya hay una sesión activa, redirigir al tablero de ajedrez
// if (isset($_SESSION['user_id'])) {
//     header("Location: Tablero.php");
//     exit();
// }

// Si el formulario de inicio de sesión ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombre_usuario']) && isset($_POST['contrasena'])) {
    include('ConexionBDD.php');
    $nombre_usuario = $conexion->real_escape_string($_POST['nombre_usuario']);
    $contrasena = $_POST['contrasena'];

    // Buscar al usuario en la base de datos
    $resultado = $conexion->query("SELECT * FROM usuarios WHERE nombre_usuario = '$nombre_usuario'");

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($contrasena, $usuario['contrasena'])) {
            $_SESSION['user_id'] = $usuario['ID'];
            $_SESSION['nombre_usuario'] = $usuario['nombre_usuario'];
            header("Location: Tablero.php"); 
            exit();
        } else {
            echo "Credenciales incorrectas.";
        }
    } else {
        echo "No se encontró el usuario.";
    }
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form method="POST" action="">
        <label for="nombre_usuario">Nombre de Usuario:</label><br>
        <input type="text" id="nombre_usuario" name="nombre_usuario" required><br><br>
        <label for="contrasena">Contraseña:</label><br>
        <input type="password" id="contrasena" name="contrasena" required><br><br>
        <input type="submit" value="Iniciar Sesión" name="iniciar">
    </form>

    <p>¿No tienes cuenta? <a href="FormularioRegistro.php">Regístrate aquí</a></p>
</body>
</html>

