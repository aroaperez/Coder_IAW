<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $_SESSION['user'] = 'Aroa'; // Guardar usuario en sesión
    if (isset($_POST['remember'])) {
        setcookie('remember', 'Usuario', time() + (86400 * 7), '/'); // Guardar cookie por 7 días
    }
    echo "Sesión iniciada.";
}

// Restaurar sesión desde cookie
if (!isset($_SESSION['user']) && isset($_COOKIE['remember'])) {
    $_SESSION['user'] = $_COOKIE['remember'];
}

// Verificar usuario autenticado
if (isset($_SESSION['user'])) {
    echo "Bienvenido, " . $_SESSION['user'];
} else {
    echo "No autenticado.";
}

// Cerrar sesión
if (isset($_POST['logout'])) {
    session_destroy();
    setcookie('remember', '', time() - 3600, '/');
    echo "Sesión cerrada.";
}

// Formularios
echo <<<FORM
<form method="POST">
    <button name="login">Iniciar sesión</button>
    <label><input type="checkbox" name="remember"> Recordarme</label>
    <button name="logout">Cerrar sesión</button>
</form>
FORM;
?>
