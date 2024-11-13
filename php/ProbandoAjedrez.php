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
        .purple {
            background-color: purple;
            color: green;
        }
        .grey {
            background-color: grey;
            color: black;
        }
    </style>
</head>
<body>
    <table>
        <?php
            $filas = 8;
            $columnas = 8;

            $fila = 1;
            while ($fila <= $filas) {
                echo "<tr>" ;
                $columna = 1;
                while ($columna <= $columnas ) {
                    if (($columna + $fila) % 2 == 0) {
                        echo "<td class='purple'></td>";
                    } else {
                        echo "<td class='grey'></td>";
                    }
                    $columna += 1;
                }
                echo "</tr>" ;
                $fila += 1;
            }
        ?>
        </table>
</body>
</html>