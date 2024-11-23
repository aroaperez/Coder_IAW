<?php

session_start();

echo "<form method='GET'>";
echo "<label for='texto'>USUARIO</label> <input type='text' name='usuario' id='usuario'>";
echo "<br>";
echo "<label for='texto'>CONTRASEÑA</label> <input type='password' name='password' id='contraseña'>";
echo "<br>";
echo "<input type='submit' value='LOGIN'>";
echo "</form>";

function es_par($numero) {
    if ($numero % 2 == 0) {
        return true;
    }
    else {
        return false;
    }
}

$password = $_GET["password"];
$login = $_GET["usuario"];

define("USUARIO", "Holi");
define("PASSWORD", "Aroa");


if(!es_par($password)) {
    echo "hola";
    $_SESSION[USUARIO] = $login;
    $_SESSION[PASSWORD] = $password;
} else {
    echo "Contraseña incorrecta";
}

