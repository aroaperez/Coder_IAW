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
        $imagenes = [
            "annulus1.png","annulus2.png","ejection1.png","ejection2.png",
            "ejection3.png","encounter1.png","encounter2.png","formation1.png",
            "formation2.png","formation3.png","formation4.png","formation5.png",
            "formation6.png","formation7.png","formation8.png","formation9.png",
            "inclined1.png","inclined2.png","inclined3.png","inclined4.png",
            "kozai1.png","kozai2.png","kozai3.png","rmleffect1.png",
            "rmleffect2.png","system1.png","system2.png"	 
        ];

        foreach($imagenes as $img){
            ?>
            <img src=" https://astro.uni-bonn.de/~ithies/images/Planet_Formation_Illustrated/PNG/<?=$img?>">
            <?php
        }
    ?>
</body>
</html>