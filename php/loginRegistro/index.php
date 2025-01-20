<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Ejecutamos la consulta.
    $resultado = $conexion->query("SELECT * FROM users WHERE username = '$username'");
    if ($resultado && $resultado->num_rows > 0) {
        $user = $resultado->fetch_assoc();
        // Verificamos la contraseña
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: home.php");
            exit;
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }
    $conexion->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LOGIN</title>
</head>
<body>
    <h2>LOGIN</h2>
    <form method="POST" action="index.php">
        <label for="username">USUARIO:</label>
        <input type="text" name="username" required><br>

        <label for="password">CONTRASEÑA:</label>
        <input type="password" name="password" required><br>

        <button type="submit">INICIAR SESIÓN</button>
    </form>
    <p>¿NO TIENES CUENTA?<p><a href="registro.php">REGISTRATE</a>
    <h2>USUARIOS REGISTRADOS</h2>
    <table border="1">
        <head>
            <tr>
                <th>ID</th>
                <th>Nombre de Usuario</th>
                <th>Email de Usuario</th>
            </tr>
        </head>
        <body>
        <?php
            // Mostrar todos los usuarios registrados
            $MostrarTabla = $conexion->query("SELECT id, username, email FROM users");
            if ($MostrarTabla->num_rows > 0) {
                while ($usuario = $MostrarTabla->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>$usuario[id]</td>";   // Mostrar ID
                    echo "<td>$usuario[username]</td>";  // Mostrar nombre de usuario
                    echo "<td>$usuario[email]</td>";  // Mostrar email de usuario
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No hay usuarios registrados</td></tr>";
            }
        ?>
        </body>
    </table>
</body>
</html>
