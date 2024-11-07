<?php

if (array_key_exists("nombre", $_POST)) {
    $nombre = $_POST["nombre"];
    echo ( "<h1>" . htmlspecialchars($nombre) . "</h1>");
};

?>

<form method="POST">
    <input type="text" name="nombre">
    <input type="submit">
</form>