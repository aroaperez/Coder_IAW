<?php

function cambia ($array, $posicion, $valor){
    $array[$posicion] = $valor;
    echo "Dentro de la funcion";
    var_dump($array);
}
$tabla = ["AROA", "ALBA", "ANA"];
cambia($tabla,1,"PEDRO");

echo ("Fuera de la tabla");
var_dump($tabla);