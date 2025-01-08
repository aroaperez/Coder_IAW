
<?php
echo "<html>";
echo "<body'style=margin:0;padding:0;'>"; 
    echo "<head>";
        $steps = isset($_GET['steps'])?(INT)$_GET['steps'] :10;
            if ($steps <= 0){
                $steps =10;
            }
        $stepstamaño= 255 / ($steps-1);
        for ($i =0; $i < $steps; $i++) {
            $valor = round($i * $stepstamaño);
            echo "<td>";
            echo "<div style='background-color:rgb($valor, $valor, $valor);
            height:30px; border:2px solid pink;'> </div>";
            echo "</td>";
        }
    echo "</head>";
echo "</body>";
echo "</html>";
?>
<br>
<br>
<br>
<?php
echo '<form method="GET">';
echo "<label for='dias'>Dias</label>
      <input type='number' step='0.01' name='dias' value='$dianumero'>";
echo "<br>";
echo "<label for='horas'>Horas</label>
      <input type='number' step='0.01' name='horas' value='$horanumero'>";
echo "<br>";
echo "<label for='minutos'>Minutos</label>
      <input type='number' step='0.01' name='minutos' value='$minutonumero'>";
echo "<br>";
echo "<label for='segundos'>Segundos</label>
      <input type='number' step='0.01' name='segundos' value='$segundonumero'>";
echo "<br>";
echo '<input type="submit" value="Submit" name="submit">';
echo "<br>";
echo '<input type="submit" value="Borrar Campos" name="borrar">';

// if ((!is_numeric($dias)|| !is_numeric($horas) || !is_numeric($minutos)) || !is_numeric($segundos)) {
//     echo "Error: Deben ser números enteros.";
// }
echo "is_numeric($dias)";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['submit'])) {
    $dias= (INT)$_GET["dias"];
    $horas= (INT)$_GET["horas"];
    $minutos= (INT)$_GET["minutos"];
    $segundos= (INT)$_GET["segundos"];
    $totalsegundos= ( $dias * 86400 ) + ($horas * 3600) + ($minutos * 60) + $segundos;
    echo "$dias días, $horas horas, $minutos minutos y $segundos segundos son un total de $totalsegundos segundos";
}
?>
<br>
<br>
<br>
<?php
$array = [
    "Álvaro" => "González",
    "María" => "González",
    "Susana" => "Pérez",
    "Manuel" => "González",
    "Juan" => "Ramírez",
    "Pepe" => "Pérez",
];
function array_invertido($array) {
    // Crear una estructura para almacenar los datos de la tabla
    $tabla = [];
    // Recorrer el array y agrupar valores por claves
    foreach ($array as $key => $value) {
        if (!isset($tabla[$value])) {
            $tabla[$value] = ['keys' => [], 'count' => 0];
        }
        $tabla[$value]['keys'][] = $key;
        $tabla[$value]['count']++;
    }
    // Imprimir la tabla
    echo "<table border='1'>";
    echo "<tr><th>Value</th><th>Keys</th><th># of keys</th></tr>";
    foreach ($tabla as $value => $data) {
        echo "<tr>";
        echo "<td>$value</td>";
        echo "<td>" . implode(' ', $data['keys']) . "</td>";
        echo "<td>{$data['count']}</td>";
        echo "</tr>";
    }
    echo "</table>";
}
// Ejemplo de uso

array_invertido($array);
?>

