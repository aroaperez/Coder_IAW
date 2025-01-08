<table>
    <?php
        // alfil d5 (I)
        // torre f2 (T)
        $filas= 8;
        $columnas= 8;

        $fila= 1;
        while ($fila <= $filas) {
            echo "<tr>";
            $columna = 1;
            while ($columna <= $columnas) {
                echo "<td>";
                if(($columna + $fila) % 2 == 0) {
                    if($fila == 4 && $columna == 5){
                        echo "I";
                    }elseif($fila == 6 && $columna == 2 ){
                        echo "T";
                    } 
                    else{
                        echo '#';
                    }   
                    } else {
                        if($fila == 4 && $columna == 5){
                            echo "I";
                        }elseif($fila == 6 && $columna == 2 ){
                            echo "T";                            
                        }
                    else{
                        echo ".";
                        } 
                    }   
                    echo "</td>";
                    $columna += 1;
                }
                echo "</tr>";
                $fila += 1;
            }
    ?>
</table>