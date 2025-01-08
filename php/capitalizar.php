
<form method="post">
    <label for="texto">INTRODUCE UN TEXTO:</label><br>
    <input type="text" id="texto" name="texto"><br><br>
    <input type="submit" value="Capitalizar">
</form>
<?php
    //IF ($_SERVER["REQUEST_METHOD"] == "POST") {
        $texto = $_POST["texto"];
        $textocapitalizado = ucwords($texto);
        echo "$textocapitalizado";
    //}
?>

<form method="post">
    <label for="palabra">INTRODUCE UNA PALABRA:</label><br>
    <input type="text" id="palabra" name="palabra"><br><br>
    <input type="submit" value="Capitalizar">
</form>
<?php
    $palabra = $_POST["palabra"];
    $palabracapitalizada = ucfirst($palabra);
    echo "$palabracapitalizada";
?>

