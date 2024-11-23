<?php
    define("GALLETA", "ejercicio-cookie");
    
    if( isset($_COOKIE[GALLETA]) ) {
        $horaanterior= $_COOKIE[GALLETA];
    }

    $horaactual = date("Y-m-d H:i:s");
    setcookie(GALLETA, $horaactual);

    echo("La hora actual es $horaactual <br>");
    if(isset($horaanterior)) {
        echo("La hora anterior es $horaanterior <br>");
    }
?>