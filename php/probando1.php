<?php
$personas = [
    ["nombre" => "Juan Pérez", "profesion" => "Ingeniero", "telefono" => "123456789", "email" => "juan@example.com"],
    ["nombre" => "María López", "profesion" => "Doctora", "telefono" => "987654321", "email" => "maria@example.com"]
];

function tarjetas_presentacion($personas) {
    echo "<table>";
        foreach( $personas as $persona) {
            echo "<tr>";
            foreach($persona as $humano) {
                echo "<td>";
                    echo $humano;
                echo "</td>";
            }
            echo "</tr>";
        }
    echo "</table>";
}
tarjetas_presentacion($personas);

?>