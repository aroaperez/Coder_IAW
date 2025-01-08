<?php
echo '<form method="POST">';
echo "<input type='number' step='0.01' name='numero' value='$numero'>";
$grados = ['Cº', 'Fº', 'Kº'];

echo '<select name="grados_entrada">';
    foreach ($grados as $gr1) {
        echo "<option value='$gr1'>$gr1 </option>";
    }
echo '</select>';

echo "<br>";
echo "Lo vamos a convertir en:";

echo '<select name="grados_salida">';
    foreach ($grados as $gr2) {
        echo "<option value='$gr2'>$gr2 </option>";
    }
echo '</select>';
echo "<br>";

echo '<input type="submit" value="Convertir" name="Convertir">';

$grado1 = $_POST["grados_entrada"];
$grado2 = $_POST["grados_salida"];
$numero = (FLOAT)$_POST["numero"];
function conversion($gradito1, $gradito2, $numerito){
    if ( $gradito1 == $gradito2 ) {
        return $numerito;
    }
    elseif ($gradito1 == "Cº" && $gradito2 == "Fº") {
        $cuenta = ($numerito * 9/5) + 32;
        return $cuenta;
    }
    elseif ($gradito1 == "Cº" && $gradito2 == "Kº") {
        $cuenta = ($numerito + 273.15);
        return $cuenta;
    }
    elseif ($gradito1 == "Fº" && $gradito2 == "Cº") {
        $cuenta = ($numerito - 32) * 5 / 9;
        return $cuenta;
    }
    elseif ($gradito1 == "Fº" && $gradito2 == "Kº") {
        $cuenta = ($numerito - 32) * 5 / 9 + 273.15;
        return $cuenta;
    }
    elseif ($gradito1 == "Kº" && $gradito2 == "Cº") {
        $cuenta = ($numerito - 273.15);
        return $cuenta;
    }
    elseif ($gradito1 == "Kº" && $gradito2 == "Fº") {
        $cuenta = ($numerito - 273.15) * 9 / 5 + 32;
        return $cuenta;
    }
}
echo "<br>";
if (isset($_POST['Convertir'])) {
    echo "<br>";
    echo "Resultado: " . conversion($grado1, $grado2, $numero);
}
?>
