
<?php
    include("primos.php");
    $numeroprimo= (int)trim($_POST["numero"]);
    if(($numeroprimo > 0) && ($numeroprimo != "")) {
        $numero = (int)$numeroprimo;
        if(es_primo($numero)){
            echo "El número $numero es primo e impar";
        }
        else {
            if (es_par($numero)) {
                echo "El número $numero no es primo <br>";
                echo "El número $numero es par<br>";
            }
            else {
                echo "El número $numero no es primo<br>";
                echo "El número $numero es impar<br>";
            }
        }
    } else {
        echo "Introduce un número mayor que 0";
    }
?>

<form method="POST">

<label for="texto">texto</label> <input type="text" name="texto" id="texto">
<hr>
<label for="numero">numero</label> <input type="numero" name="numero" id="numero">
<hr>
<input type="submit">

</form>