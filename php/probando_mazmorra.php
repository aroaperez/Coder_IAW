<?php
    $tiles = [
        ["E", "E", "E", "E"],
        ["E", "ETE", "E", "E"],
        ["ET", "TIE", "E", "ET"],
        ["EI", "IT", "T", "TI"]   
    ];
function mazmorra($tiles){
    $filas=count($tiles);
    $columnas=count($tiles[1]);
    $fila=0;
    echo "<table>";
        while($fila < $filas){
            echo "<tr>";
                $columna= 0;
                while($columna < $columnas){
                    echo "<td>";
                        echo "<img src=\"../practica01/tiles/" . $tiles[$fila][$columna] . ".png\">";
                    echo "</td>";
                    $columna++;
                }
            echo "</tr>";
            $fila++;
        }
    echo "</table>";
}
mazmorra($tiles);
?>




