<?php

ini_set('display_errors' , 1);
ini_set('display_startup_errors' , 1);
error_reporting(E_ALL);

// function crea_tablas($conn) {
//     $result= $conn->query('
//     create table clientes(
//         id int auto_increment primary key,
//         nombre varchar(255),
//         apellidos varchar(255)
//     );
//     ');
// }
// try{
//     crea_tablas($conexion);
//     echo ("Tabla de clientes creada");
// }
// catch (Exception $Error){
//     echo ("Error");
//     var_dump($Error->getMessage());
// }

function crea_tablas_form($n, $c1, $t1, $c2, $t2, $c3, $t3) {
    $conexion = new mysqli ("localhost", "php", "php", "php");
    try {
    $result= $conexion->query("
    create table $n(
        $c1 $t1 primary key,
        $c2 $t2,
        $c3 $t3
    );
    ");
    }
    catch (Exception $Error) {
        echo ($Error->getMessage());
    }
    finally {
        $conexion->close();
    }
}
if (isset($_GET['submit'])) {
    $nom= $_GET["nombre"];
    $ca1= $_GET["numero1"];
    $ca2= $_GET["numero2"];
    $ca3= $_GET["numero3"];
    $ti1= $_GET["tn1"];
    $ti2= $_GET["tn2"];
    $ti3= $_GET["tn3"];
    crea_tablas_form($nom, $ca1, $ti1, $ca2, $ti2, $ca3, $ti3);
    echo ("Tabla creada correctamente");
}

?>

<form method="GET">
<label for="texto">Nombre Tabla</label> <input type="text" name="nombre">
<hr>
<label for="numero">Nombre campo 1</label> <input type="numero" name="numero1">
<hr>
<label>Tipo de Campo</label>
<select name="tn1">
    <option value="int">Entero</option>">
    <option value="int auto_increment">Entero auto_increment</option>">
    <option value="varchar(255)">Texto</option>
</select>
<hr>
<label for="numero">Nombre campo 2</label> <input type="numero" name="numero2">
<hr>
<label>Tipo de Campo</label>
<select name="tn2">
    <option value="int">Entero</option>">
    <option value="varchar(255)">Texto</option>
</select><hr>
<label for="numero">Nombre campo 3</label> <input type="numero" name="numero3">
<hr>
<label>Tipo de Campo</label>
<select name="tn3">
    <option value="int">Entero</option>">
    <option value="varchar(255)">Texto</option>
</select>
<hr>
<input type="submit" name="submit">
</form>