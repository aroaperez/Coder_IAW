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
</head>
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
    }
</style>
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
    <h2>DUPLICAR MAZMORRA</h2>
    <?php
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
                        echo "<td><img src='tiles/$ImagenT'></td>";
                    } else {
                        echo "<td><img src='tiles/E.png'></td>";
                    }
                }
            echo "</tr>";
        }
        echo "</table>";
    ?>
    <br>
    <form action="listado-mazmorras.php">
        <label>Nombre de la Nueva Mazmorra:</label>
        <input type="text" name="NombreMazmorra" placeholder="Nombre Nueva Mazmorra" value="<?php echo ($NuevoNombre); ?>">
        <input type="submit" name="Duplicar" value="DUPLICAR">
        <input type="hidden" name="ID" value="<?php echo($ID); ?>">
    </form>
</body>