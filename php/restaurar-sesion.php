<?php
session_start ();

if (isset($_SESSION["UltimaPagina"])) {
    $URL= $_SESSION["UltimaPagina"];
    header ("Location:$URL");
} else {
    header ("Location:listado-mazmorras.php");
}
?>