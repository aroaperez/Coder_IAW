<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página Web</title>
    <style>
    img {
    width: 300px;
    height: auto;
    border: 2px solid black;
    border-radius: 8px;
    }
    </style>
</head>
<body>
    <?php
        $alumnos = [
            "Pepe",
            "María",
            "Juan",
            "Susana"
        ];
        foreach($alumnos as $alumno){
            print( "Alumno: $alumno <br>");
        }
        echo"<hr>";
        foreach($alumnos as $posicion => $alumno){
            print( "Alumno $posicion: $alumno <br>" );
        }
    ?>
</body>
</html>