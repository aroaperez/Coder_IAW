<?php

// query para saber si existe el usuario

function existe_usuario($usuario) {
    $usuarios = [ "pepe", "maria", "juan", "susana" ];
    return in_array($usuario,$usuarios);
}

$json = file_get_contents('php://input');
$request = json_decode($json, true);

$usuario= $request["usuario"];
$existe = existe_usuario($usuario);
$response = ["existe" => $existe];

header('Content-Type: application/json');
echo json_encode($response);