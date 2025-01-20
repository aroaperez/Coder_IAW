<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Iniciar la sesión
session_start();
// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location: Sesiones.php"); // Redirigir a la página de inicio de sesión si no está autenticado
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablero de Ajedrez</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px;
            border: 2px solid;
        }
        td {
            width: 80px;
            height: 80px;
            text-align: center;
            font-size: 14px;
            border: 2px solid;
        }
        tr {
            border-collapse: collapse;
        }
        .grey {
            background-color: grey;
            color: black;
        }
        .white {
            background-color: white;
            color: black;
        }
        .imagen {
            width: 5rem;
            height: 5rem;
        }
        .peones {
            width: 5rem;
            height: 5rem; 
        }
    </style>
</head>
<body>
<h2>AJEDREZ - Bienvenido, <?php echo $_SESSION['nombre_usuario']; ?></h2>
<table>
    <?php
    $ImagenesAjedrezBlancas = ["torre-blanca.png", "caballo-blanco.png", "alfil-blanco.png", "reina-blanca.png", "rey-blanco.png", "alfil-blanco.png", "caballo-blanco.png", "torre-blanca.png"];
    $ImagenesAjedrezNegras = ["torre-negra.png", "caballo-negro.png", "alfil-negro.png", "reina-negra.png", "rey-negro.png", "alfil-negro.png", "caballo-negro.png", "torre-negra.png"];

    $filas = 8;
    $columnas = 8;

    // Generar tablero de ajedrez
    for ($fila = 1; $fila <= $filas; $fila++) {
        echo "<tr>";
        for ($columna = 1; $columna <= $columnas; $columna++) {
            if (($fila + $columna) % 2 == 0) {
                echo "<td class='white'>";
                if ($fila == 2) {
                    $ImagenPeonNegra = "peon-negro.png";
                    echo "<img class='peones' src='ImagenesAjedrez/$ImagenPeonNegra'>";
                }
                if ($fila == 7) {
                    $ImagenPeonBlanco = "peon-blanco.png";
                    echo "<img class='peones' src='ImagenesAjedrez/$ImagenPeonBlanco'>";
                }
                if ($fila == 1) {
                    echo "<img class='imagen' src='ImagenesAjedrez/{$ImagenesAjedrezNegras[$columna - 1]}' alt='Pieza Negra'>";
                }
                if ($fila == 8) {
                    echo "<img class='imagen' src='ImagenesAjedrez/{$ImagenesAjedrezBlancas[$columna - 1]}' alt='Pieza Blanca'>";
                }
                echo "</td>";
            } else {
                echo "<td class='grey'>";
                if ($fila == 2) {
                    $ImagenPeonNegra = "peon-negro.png";
                    echo "<img class='peones' src='ImagenesAjedrez/$ImagenPeonNegra'>";
                }
                if ($fila == 7) {
                    $ImagenPeonBlanco = "peon-blanco.png";
                    echo "<img class='peones' src='ImagenesAjedrez/$ImagenPeonBlanco'>";
                }
                if ($fila == 1) {
                    echo "<img class='imagen' src='ImagenesAjedrez/{$ImagenesAjedrezNegras[$columna - 1]}' alt='Pieza Negra'>";
                }
                if ($fila == 8) {
                    echo "<img class='imagen' src='ImagenesAjedrez/{$ImagenesAjedrezBlancas[$columna - 1]}' alt='Pieza Blanca'>";
                }
                echo "</td>";
            }
        } 
        echo "</tr>";
    }
    ?>
</table>

