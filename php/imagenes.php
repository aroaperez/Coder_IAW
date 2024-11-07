<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página Web</title>
    <style>
        
    </style>
</head>
<body>
    <?php
        for ($imagen = 1973; $imagen <= 2024; $imagen +=1){
            echo "<img src=\"https://www.glerl.noaa.gov/data/ice/max_anim/png/$imagen.png\" alt=\"img\">";
        }
    ?>
</body>
</html>