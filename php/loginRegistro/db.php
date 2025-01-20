<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "aroa";
$password = "aroa";
$database = "usuarios";

$conexion = new mysqli ($servername, $username, $password, $database);

if ($conexion->connect_error) {
    die("Error en la conexion: " . $conexion->connect_error);
}
?>