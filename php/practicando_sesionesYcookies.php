<?php

session_start();

// Verificar si existe una cookie llamada "usuario_id"
if (isset($_COOKIE['usuario_id'])) {
    // Si la cookie existe, restaurar la sesión usando el ID de la cookie
    if (!isset($_SESSION['usuario'])) {
        // Por seguridad, puedes agregar validación adicional aquí
        $_SESSION['usuario'] = [
            'id' => $_COOKIE['usuario_id'],
            'nombre' => 'Usuario ' . substr($_COOKIE['usuario_id'], -4), // Ejemplo de nombre genérico
        ];
    }
    // Mensaje para el usuario conocido
    echo "Hola de nuevo, " . htmlspecialchars($_SESSION['usuario']['nombre']) . "!<br>";
    echo "Tu ID único es: " . htmlspecialchars($_SESSION['usuario']['id']) . "<br>";
} else {
    // Si no hay cookie, es un usuario nuevo
    $nuevo_usuario_id = uniqid('usuario_', true);
    // Crear una nueva sesión para el usuario
    $_SESSION['usuario'] = [
        'id' => $nuevo_usuario_id,
        'nombre' => 'Nuevo Usuario',
    ];
    // Crear una cookie para recordar al usuario en futuras visitas (1 mes de duración)
    setcookie('usuario_id', $nuevo_usuario_id, time() + (3600 * 24 * 30), "/", "", false, true);
    // Mensaje para el nuevo usuario
    echo "¡Bienvenido, nuevo usuario!<br>";
    echo "Se te ha asignado un ID único: " . htmlspecialchars($nuevo_usuario_id) . "<br>";
}
// Mostrar los datos almacenados en la sesión actual (para depuración)
echo "<h3>Datos de la sesión:</h3>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
?>

-----------------------------------------------------------------------------------------------------------

<?php
if (isset($_COOKIE['visitas'])) {
    // Incrementar el contador de visitas
    $visitas = $_COOKIE['visitas'] + 1;
    setcookie('visitas', $visitas, time() + (3600 * 24 * 30)); // Cookie válida por 30 días
    echo "Esta es tu visita número: $visitas.";
} else {
    // Primera visita del usuario
    setcookie('visitas', 1, time() + (3600 * 24 * 30));
    echo "¡Bienvenido por primera vez!";
}
?>

-----------------------------------------------------------------------------------------------------------

<?php
session_start();

if (isset($_SESSION['nombre'])) {
    echo "Hola de nuevo, " . htmlspecialchars($_SESSION['nombre']) . "!";
} else {
    // Guardar el nombre en la sesión
    $_SESSION['nombre'] = "Juan";
    echo "¡Hola, nuevo usuario! Tu nombre ahora está almacenado en la sesión.";
}
?>

-----------------------------------------------------------------------------------------------------------

<?php
if (isset($_COOKIE['idioma'])) {
    echo "Tu idioma preferido es: " . htmlspecialchars($_COOKIE['idioma']) . ".";
} else {
    // Establecer idioma predeterminado
    setcookie('idioma', 'es', time() + (3600 * 24 * 30)); // Cookie válida por 30 días
    echo "Se ha configurado el idioma predeterminado: Español.";
}
?>

-----------------------------------------------------------------------------------------------------------

<?php
session_start();

// Simulando datos de inicio de sesión
$usuarios = [
    "admin" => "12345",
    "usuario" => "67890"
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar credenciales
    if (isset($usuarios[$username]) && $usuarios[$username] === $password) {
        $_SESSION['username'] = $username;
        setcookie('logged_in', true, time() + (3600 * 24 * 30)); // Cookie válida por 30 días
        echo "Inicio de sesión exitoso. ¡Bienvenido, $username!";
    } else {
        echo "Credenciales incorrectas.";
    }
} elseif (isset($_COOKIE['logged_in']) && isset($_SESSION['username'])) {
    echo "¡Hola de nuevo, " . htmlspecialchars($_SESSION['username']) . "!";
} else {
    echo "Por favor, inicia sesión.";
}
?>
<!-- Formulario de inicio de sesión -->
<form method="post">
    <input type="text" name="username" placeholder="Usuario">
    <input type="password" name="password" placeholder="Contraseña">
    <button type="submit">Iniciar sesión</button>
</form>

-----------------------------------------------------------------------------------------------------------

<?php
session_start();

// Productos disponibles
$productos = [
    1 => "Laptop",
    2 => "Teléfono",
    3 => "Tablet"
];

// Agregar al carrito
if (isset($_GET['agregar'])) {
    $id_producto = (int)$_GET['agregar'];
    $_SESSION['carrito'][$id_producto] = ($_SESSION['carrito'][$id_producto] ?? 0) + 1;
    echo "Producto agregado al carrito.";
}

// Mostrar carrito
echo "<h3>Carrito de compras:</h3>";
if (!empty($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $id => $cantidad) {
        echo $productos[$id] . " - Cantidad: $cantidad<br>";
    }
} else {
    echo "El carrito está vacío.";
}

// Mostrar lista de productos
echo "<h3>Productos disponibles:</h3>";
foreach ($productos as $id => $nombre) {
    echo "$nombre - <a href='?agregar=$id'>Agregar al carrito</a><br>";
}
?>

-----------------------------------------------------------------------------------------------------------

<?php
session_start();

// Tiempo máximo de inactividad (en segundos)
$tiempo_maximo = 300; // 5 minutos

if (isset($_SESSION['ultimo_acceso'])) {
    $inactividad = time() - $_SESSION['ultimo_acceso'];
    if ($inactividad > $tiempo_maximo) {
        session_unset(); // Eliminar datos de la sesión
        session_destroy(); // Destruir la sesión
        echo "La sesión ha expirado por inactividad.";
        exit;
    }
}

// Actualizar el tiempo del último acceso
$_SESSION['ultimo_acceso'] = time();

echo "Bienvenido, tu sesión está activa.";
?>
