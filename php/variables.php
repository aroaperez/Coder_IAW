
<head>
    <title>Prueba de variables</title>
</head>
<body>
    <h2>Esto es una prueba de variables</h2>
        <?php
            $numero = 9;
            $flotante = 9.6;
            $cuenta = $numero * $flotante;
            if ($cuenta > 50) {
                $color="red";
            }
            else {
                $color="blue";
            }
        ?>
    <div style="border:2px black solid; background:<?= $color ?>">
            <?php
                print("$numero * $flotante = $cuenta");
            ?>
    </div>
</body>
</html>
