<?php
$menu = [
    "Inicio" => "index.php",
    "Acerca de" => "about.php",
    "Servicios" => "services.php",
    "Contacto" => "contact.php"
];

function menu_navegacion( $menu ) {
    foreach ( $menu as $menuito => $menuitem ) {
        echo "<ul>";
            echo "<li>";
                echo "$menuito = $menuitem";
            echo "</li>";
        echo "</ul>";
    }
}
menu_navegacion($menu);

$menu = [
    "Texto" => "text",
    "Contraseña secreta" => "password",
    "E-mail" => "email",
    "Telefono" => "number"
];
function formulario($menu){
    echo "<table>";
        foreach($menu as $clasificador => $tipo){
            $tipofix = str_replace(' ','_', $tipo);
            echo '<tr>';
            echo "<td><label for=\"$tipofix\">$clasificador</label></td>"; 
            echo "<td><input type=\"$tipo\" name=\"$tipofix\" id=\"$tipofix\"></td>";
            echo '</tr>';
        }
    echo "</table>";
}
formulario($menu);
?>

