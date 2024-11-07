<?php
$nombreyapellido = 'Pérez Sánchez, Aroa';

$nombre = explode (",", $nombreyapellido)[1];
$apellidos = explode (",", $nombreyapellido)[0];
$apellido1 = explode (" ", $apellidos)[0];
$apellido2 = explode (" ", $apellidos)[1];

echo ("El nombre es $nombre, el primer apellido es $apellido1 y el segundo apellido es $apellido2<br>");
echo (implode(" ",["uno", "dos", "tres", "cuatro"]));

?>

<h1>Ejemplo printf </h1>

<?php

$num= -5;
$ubicacion = 'árbol';

echo sprintf('Hay %.2f monos en el %s<br>', $num, $ubicacion);

$array = [
    'arbol' => -598,
    'suelo' => 67.2,
    'cuevas'=> 73,
];

foreach($array as $ubicacion => $num) {
    echo sprintf('Hay %.2f monos en el %s<br>', $num, $ubicacion);   
}
?>

<h1>Ejemplo isset </h1>
<?php
 echo ('Existe $array?:' . isset($array) . "<br>");
 echo ('Existe $arrayquenoexiste?:' . isset($arrayquenoexiste) . "<br>");
?>