<head>
    <title>Tablero de Ajedrez</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px;
        }
        td {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 14px;
        }
        .black {
            background-color: black;
            color: green;
        }
        .green {
            background-color: green;
            color: black;
        }
    </style>
</head>
<body>
    <h4>Vamos a crear nuestro tablero de ajedrez</h4>
    <?php
        $filas= (int)trim($_POST["filas"]);
        $columnas= (int)trim($_POST["columnas"]);
        echo "<table>";
            $fila= 1;
            while ($fila <= $filas) {
                echo "<tr>";
                $columna = 1;
                while ($columna <= $columnas) {
                    
                    if(($columna + $fila) % 2 == 0) {
                        // PAR
                        echo "<td class='green'></td>";
                    } else {
                        // IMPAR
                        echo "<td class='black'></td>";
                    }
                    $columna += 1;
                }
                echo "</tr>"; // Cierra la fila después de que se completa
                $fila += 1; // Aumenta la fila aquí
            }
        echo "</table>";

    ?>
    
    <form method="POST">
        <label for="filas">Filas</label> <input type="number" name="filas" id="fila">
        <hr>
        <label for="columnas">Columnas</label> <input type="number" name="columnas" id="columna">
        <hr>
        <input type="submit">
    </form>

</body>
</html>