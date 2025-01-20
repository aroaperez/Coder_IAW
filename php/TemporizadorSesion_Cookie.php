<?php
session_start();

// Configurar tiempo de expiración
if (!isset($_SESSION['last_activity'])) {
    $_SESSION['last_activity'] = time();
}

$inactive = 900; // 15 minutos
if (time() - $_SESSION['last_activity'] > $inactive) {
    session_destroy();
    echo "Sesión expirada.";
} else {
    $_SESSION['last_activity'] = time();
    echo "Sesión activa.";
}
?>
