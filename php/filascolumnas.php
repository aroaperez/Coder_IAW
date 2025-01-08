<?php
// Array inicial
$array = [1, 2, 5, 7, 9, 4];

// Determinar la cantidad de filas y columnas
$columnas = 2; // Número de columnas
$filas = ceil(count($array) / $columnas); // Calcular el número de filas

// Generar la tabla
echo "<table border='1' style='border-collapse: collapse; text-align: center;'>";

// Llenar la tabla por columnas
for ($fila = 0; $fila < $filas; $fila++) {
    echo "<tr>";
    for ($columna = 0; $columna < $columnas; $columna++) {
        // Calcular el índice del array a imprimir
        $indice = $fila + ($columna * $filas);

        // Verificar si el índice existe en el array
        if (isset($array[$indice])) {
            echo "<td>" . $array[$indice] . "</td>";
        } else {
            echo "<td></td>"; // Si no existe, celda vacía
        }
    }
    echo "</tr>";
}

echo "</table>";
?>
