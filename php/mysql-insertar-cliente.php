<?php

ini_set('display_errors' , 1);
ini_set('display_startup_errors' , 1);
error_reporting(E_ALL);

$resultado = $mysqli->query("SELECT id FROM test ORDER BY id ASC");

echo "Orden del conjunto de resultados...\n";
$resultado->data_seek(0);
while ($fila = $resultado->fetch_assoc()) {
    echo " id = " . $fila['id'] . "\n";
}


echo '<form method="GET">';
foreach ($fila as $campo) {
    echo '<label>$Campo</label>';
    echo '<input type="text" name="$campo">';
}
echo '<input type="submit" name="submit">';
echo '</form>';