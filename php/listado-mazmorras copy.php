<?php
    ini_set('display_errors' , 1);
    ini_set('display_startup_errors' , 1);
    error_reporting(E_ALL);

    // CREAMOS LAS TABLAS SI NO EXISTEN
    $conexion = new mysqli ("localhost", "practica02", "practica02", "practica02");
    $conexion->query("   
        create table IF NOT EXISTS Mazmorra (
            idmazmorra INT AUTO_INCREMENT primary key,
            nombre varchar(255) 
        );
    ");
    $conexion->query("
        create table IF NOT EXISTS Tesela (
            idmazmorra INT,
            fila INT,
            columna INT,
            tesela varchar(255),
            PRIMARY KEY (idmazmorra, fila, columna),
            FOREIGN KEY (idmazmorra) REFERENCES Mazmorra(idmazmorra) 
        );
    ");
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
        border-collapse: collapse;
    }
     th, td {
        border: solid 1px black;
        border-collapse: collapse;
        padding: 8px; 
    }
    form {
        display: inline;
    }
</style>
<body>
    <h2>CREACIÓN DE MAZMORRAS</h2>
        <form method="GET">
        <label>Nombre de la Mazmorra </label>
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="submit" name="CREAR" value="CREAR">
        </form>
        <?php
        // CREACIÓN DE NUEVA MAZMORRA
        if (isset($_GET['CREAR'])) {
            $nombre= $_GET["nombre"];
            $conexion->query("
                INSERT INTO Mazmorra (nombre) VALUES ('$nombre');
            ");
        }
        // BORRAR MAZMORRA
            if (isset($_GET['Borrar'])) {
                $BorrarMazmorra= $_GET["mazmorra"];
                $conexion->query("
                    DELETE FROM Tesela WHERE idmazmorra = $BorrarMazmorra;
                ");
                $conexion->query("
                     DELETE FROM Mazmorra WHERE idmazmorra = $BorrarMazmorra;
                ");
            } 
        ?>
    <script>
    // FUNCION JAVASCRIPT-MENSAJE DE ALERTA
        function Borrado (mazmorra) {
            return window.confirm(`¿Estás segur@ de que quieres borrar esta Mazmorra ${mazmorra}?`);
        }
    </script>
    <h2>LISTADO DE MAZMORRAS</h2>
    <table>
            <tr>
                <th>IdMazmorra</th>
                <th>Nombre</th>
                <th>Botones</th>
            </tr>
    <?php
     // DUPLICAR UNA  MAZMORRA
     if (isset($_GET['Duplicar'])) {
        $nombre= $_GET["NombreMazmorra"];
        $ID = $_GET["ID"];
        $conexion->query("
        INSERT INTO Mazmorra (nombre) VALUES ('$nombre');
        ");
        $NuevoID = $conexion->insert_id;
        $Teselas = $conexion->query("
            SELECT * FROM Tesela WHERE idmazmorra = $ID;
        ");
        $ArrayTeselas = $Teselas->fetch_all(MYSQLI_ASSOC);
        foreach($ArrayTeselas as $T){
            $idmazmorra = $T['idmazmorra'];
            $fila = $T['fila'];
            $columna = $T['columna'];
            $tesela = $T['tesela'];
            $TeselasInsert = $conexion->query("
                INSERT INTO Tesela (idmazmorra,fila,columna,tesela) VALUES ($NuevoID,$fila,$columna,'$tesela');
            ");
        }       
    }
        $MostrarTablas = $conexion->query("
            SELECT idmazmorra, nombre FROM Mazmorra ORDER BY idmazmorra;
        ");
        $MostrarTablas->data_seek(0);
        while ($fila = $MostrarTablas->fetch_assoc()) {
        echo "<tr>";
            echo "<td>$fila[idmazmorra]</td>";
            echo "<td>$fila[nombre]</td>";
            echo "<td>";
                echo "<form action='editar-mazmorra.php'>";
                    echo "<input type='hidden' value='$fila[idmazmorra]' name='mazmorra'>";
                    echo "<input type='submit' value='Editar' name='Editar'>";
                echo "</form>";
                echo "<form onsubmit='return Borrado($fila[idmazmorra])'>";
                    echo "<input type='hidden' value='$fila[idmazmorra]' name='mazmorra'>";
                    echo "<input type='submit' value='Borrar' name='Borrar'>";                
                echo "</form>";
                echo "<form action='duplicar-mazmorra.php'>";
                    echo "<input type='hidden' value='$fila[idmazmorra]' name='mazmorra'>";
                    echo "<input type='submit' value='Duplicar' name='Duplicar' >";                
                echo "</form>";
            echo "</td>";
        echo "</tr>";
        }
    ?>
    </table>
</body>

