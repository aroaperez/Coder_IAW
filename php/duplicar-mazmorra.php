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
            border-radius: px;
            background-color: #fff;
            border-collapse: collapse;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px;
            display: inline-block;
        }
        td {
            border: solid 1px black;
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