<?php
    define("GALLETA", "ya-te-conozco");
    if( isset($_COOKIE[GALLETA]) ) {
        echo ("Ya te conozco, eres" . htmlspecialchars($_COOKIE[GALLETA]));
    }
    else{
        $valor_aleatorio = uniqid(GALLETA, true);
        setcookie(GALLETA, $valor_aleatorio);
        echo ("No te conocia, pero ahora ya eres" . htmlspecialchars($valor_aleatorio));
    }
?>