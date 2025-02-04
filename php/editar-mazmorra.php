<?php
    ini_set('display_errors' , 1);
    ini_set('display_startup_errors' , 1);
    error_reporting(E_ALL);

    $conexion = new mysqli ("localhost", "practica02", "practica02", "practica02");

    session_start();
    $_SESSION["UltimaPagina"] = $_SERVER["REQUEST_URI"];
?>
<head>
    <meta charset="UTF-8">
    <script>
        function SELECCIONARFILA (fila) {
            let filacambio = document.getElementById("fila");
            filacambio.value=fila;
        }
        function SELECCIONARCOLUMNA (columna) {
            document.getElementById("columna").value=columna;
        }
        function SELECCIONARTESELA (tesela) {
            document.getElementById("tesela").value=tesela;
        }
    </script>
    <style>
        body{
            font-family:  Arial, sans-serif;
            background: linear-gradient(135deg, #a8c9e3,  #d1e8f7, #b3d7f7,  #6ea8e3);          
            background-color: #f4f4f4;
            background-attachment: fixed;
            text-align: center;
        }
        h2 {
            font-size: 25px;
            color: #333;
            margin: 10px 0;
        }
        button {
            background-color: #cfe7c2;
            border: none;
            color: black;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin: 5px;
        }
        a, button a {
            text-decoration: none;
            color: black;
        }
        table {
            margin: 20px auto;
            border: solid 1px #ddd;
            border-radius: 8px;
            background-color: #fff;
            border-collapse: collapse;
        }
        .BordesPaleta {
            border: 2px dotted;
        }
        .TablaPaleta {
            margin-top: 20px;
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px;
            display: inline-block;
        }
        td {
            border: solid 1px black;
            cursor: pointer; /*CELDAS EN LAS QUE SE PUEDE HACER CLICK */
            padding: 0;
        }
        form {
            margin-top: 20px;
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px;
            display: inline-block;
        }
        input, select {
            padding: 5px;
            font-size: 14px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        input[type="number"], select {
            width: 100px;
        }
    </style>
<head>
<body>
    <?php
        // MAZMORRA QUE QUEREMOS DUPLICAR
        if (isset($_GET['mazmorra'])) {
            $ID = $_GET['mazmorra'];
            $TablaDuplicar = $conexion->query( "
                SELECT nombre FROM Mazmorra WHERE idmazmorra = $ID;
            ");
            $TablaDuplicar->data_seek(0);
                while ($fila = $TablaDuplicar->fetch_assoc()) {
                    $NuevoNombre = $fila['nombre'];
                }
        } else {
            $NuevoNombre='';
            $ID='';
        }
        
        // ACTUALIZAR TESELA
        if (isset($_GET['ActualizarMazmorra'])) {
            $NuevaFila = $_GET['fila'];
            $NuevaColumna = $_GET['columna'];
            $NuevaTesela = $_GET['tesela'];
            $NuevoID = $_GET['mazmorra'];

            $SeleccionarTesela = $conexion->query("
                SELECT * FROM Tesela WHERE idmazmorra=$NuevoID AND fila=$NuevaFila AND columna=$NuevaColumna
            ");
            $SeleccionarTeselaArray = mysqli_fetch_array($SeleccionarTesela);

            if ($SeleccionarTeselaArray) {
                $Actualizar = $conexion->query("
                    UPDATE Tesela SET Tesela='$NuevaTesela' WHERE idmazmorra=$NuevoID AND fila=$NuevaFila AND columna=$NuevaColumna
                ");
            } else {
                $Insertar = $conexion->query("
                    INSERT INTO Tesela VALUES ($NuevoID, $NuevaFila, $NuevaColumna, '$NuevaTesela')
                ");
            }
        }

        $Teselas = $conexion->query("
            SELECT * FROM Tesela WHERE idmazmorra = $ID;
        ");
        $ArrayTeselas = $Teselas->fetch_all(MYSQLI_ASSOC);
    ?>

    <button><a href="listado-mazmorras.php">VOLVER AL LISTADO</a></button>
    <H2>NOMBRE DE LA MAZMORRA: <?php echo ($NuevoNombre); ?>(<?php echo ($ID); ?>)</H2>
    <H2>EDITAR MAZMORRA</H2>
    <?php
        echo "<form action='' method='GET'>";
        echo "<table>";
        for ($i = 1; $i <= 5; $i++) {
            echo "<tr>";
                for ($a = 1; $a <= 10; $a++) {
                    if ($ArrayTeselas) {
                        $ImagenT = "E.png";
                        foreach ($ArrayTeselas as $FILA) {
                            if ($i == $FILA["fila"] && $a == $FILA["columna"]) {
                                $ImagenT = $FILA["tesela"];
                            } 
                        }
                        echo "<td onclick='SELECCIONARFILA($i); SELECCIONARCOLUMNA($a)'><img src='tiles/$ImagenT'></td>";
                    } else {
                        echo "<td onclick='SELECCIONARFILA($i); SELECCIONARCOLUMNA($a)'><img src='tiles/E.png'></td>";
                    }
                }
            echo "</tr>";
        }
        echo "</table>";
        echo "</form>";
  
    $ImagenesTeselas= ["E.png", "EI.png", "EIT.png", "ET.png", "ETE.png",
                    "I.png", "IE.png", "IT.png", "T.png", "TE.png",
                    "TI.png", "TIE.png", "TIT.png"];
    ?>
    <H2>PALETA</H2>
    <table class="TablaPaleta">
        <tr>
            <?php
            foreach ($ImagenesTeselas as $Imagen){
                echo "<td class='BordesPaleta'>";
                    echo "<img src='tiles/$Imagen' onclick='SELECCIONARTESELA(\"$Imagen\")'>";
                echo "</td>";
            };
            ?>
        </tr>
    </table>
    <br>
    <form method="GET"> 
        <input type="hidden" name="mazmorra" value="<?php echo $ID ?>">
        <label>Fila:</label>
            <input type="number" name="fila" id="fila">
        <label>Columna:</label>
            <input type="number" name="columna" id="columna">
        <label>Tesela:</label>
        <select name="tesela" id="tesela">
            <?php
                foreach($ImagenesTeselas as $Imagen) {
                    echo "<option value='$Imagen'>$Imagen</option>";
                }
            ?>
        </select>
        <button type="SUBMIT" name="ActualizarMazmorra">ACTUALIZAR MAZMORRA</button>
    </form>
</body>
