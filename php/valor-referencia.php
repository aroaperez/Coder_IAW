<?php

function cambia ($array, $posicion, $valor){
    $array[$posicion] = $valor;
    echo "Dentro de la funcion";
    var_dump($array);
}
$tabla = ["Pepe", "Juan", "Maria"];
cambia($tabla,2,"Susana");

echo ("Fuera de la tabla");
var_dump($tabla);