<?php
    define("SES_CONTADOR", "contador");

    session_start();

    echo ("Esta pagina usa sesiones <br>");

    if (array_key_exists(SES_CONTADOR, $_SESSION)) {
        echo "Llevas" . $_SESSION[SES_CONTADOR] ."visitas <br>";
    }
    else {  
        echo "Es tu primera visita <br>";
        $_SESSION[SES_CONTADOR] = 0;
    }

    $_SESSION[SES_CONTADOR] += 1;
?>