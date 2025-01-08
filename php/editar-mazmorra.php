<?php
    ini_set('display_errors' , 1);
    ini_set('display_startup_errors' , 1);
    error_reporting(E_ALL);

    $conexion = new mysqli ("localhost", "practica02", "practica02", "practica02");

    session_start();
    $_SESSION["UltimaPagina"] = $_SERVER["REQUEST_URI"];
?>
<!DOCTYPE html>
<html lang="es">
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
            text-align: center;
        }
        table {
            margin: auto;
            border: solid 1px black;
            border-collapse: collapse;
        }
        td {
            border: solid 1px black;
            height: 40px;
            width: 40px;
            cursor: pointer; /*CELDAS EN LAS QUE SE PUEDE HACER CLICK */
        }
    </style>
<head>
<body>
    <?php
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
                        foreach ($ArrayTeselas as $FILA) {
                            if ($i == $FILA["fila"] && $a == $FILA["columna"]) {
                                $ImagenT = $FILA["tesela"];
                            } else {
                                $ImagenT = "E.png";
                            }
                        echo "<td onclick='SELECCIONARFILA($i); SELECCIONARCOLUMNA($a)'><img src='tiles/$ImagenT'></td>";
                        }
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
    <table>
        <tr>
            <?php
            foreach ($ImagenesTeselas as $Imagen){
                echo "<td>";
                    echo "<img src='tiles/$Imagen' onclick='SELECCIONARTESELA(\"$Imagen\")'>";
                echo "</td>";
            };
            ?>
        </tr>
    </table>
    <br>
    <form method="GET"> 
        <label>Fila:</label>
            <input type="number" name="fila">
        <label>Columna:</label>
            <input type="number" name="columna">
        <label>Tesela:</label>
        <select>
            <?php
                foreach($ImagenesTeselas as $Imagen) {
                    echo "<option value='$Imagen'>$Imagen</option>";
                }
            ?>
        </select>
        <button type="SUBMIT" name="submit">ACTUALIZAR MAZMORRA</button>
    </form>
</body>
