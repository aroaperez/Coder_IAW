<?php
function calendario($diasmes,$diasemana){
    $dias=["L", "M", "X", "J", "V", "S", "D"];
    $cantidaddias=[];
    for($i=1-$diasemana; $i<=$diasmes; $i++){
        if ($i >= 1) {
            array_push($cantidaddias, $i);
        } else {
            array_push($cantidaddias, '');
        }
    }
    echo "<table>";
    echo "<tr>";
    foreach($dias as $dia){
        echo "<th>";
            echo $dia;
        echo "</th>";
    }
    echo "</tr>";
    for ($i=0; $i<5; $i++) {
        echo "<tr>";
            for ($a=0; $a<7; $a++){
                echo "<td>";
                    echo $cantidaddias[$a+(7*$i)];
                echo "</td>";
            }
        echo "</tr>";
    }
    echo "</table>";
}
calendario(30, 4);