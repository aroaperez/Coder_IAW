<html>
<head>
    <style>
        td {
            padding: 5px;
        }
        label {
            display: inline-block;
            width: 200px; 
            text-align: right;
        }
        /* Centrado del botón */
        .submit {
            text-align: left;
        }
    </style>
</head>
<body>
<table>
<?php
$estructura_formulario = [
    "Nombre" => "text",
    "Email" => "email",
    "Edad" => "number",
    "Acepta politica de seguridad" => "checkbox"
];
function formulario($estructura_formulario) {
    echo '<form method="GET">';
    echo "<table>";
       foreach($estructura_formulario as $nombre => $tipo) {
            $remplazar = str_replace(' ', '_', $nombre);
            echo "<tr>";
                echo '<td><label for="'. $remplazar .'">' . htmlspecialchars($nombre) . '</label></td>';
                echo '<td><input type="'. htmlspecialchars($tipo) .'" name="'. $remplazar .'" id="'. $remplazar .'"></input></td>';
            echo "</tr>";
        }
        echo "<tr class='submit'>";
            echo "<td></td>";
            echo "<td>";
                echo '<input type="submit" value="Submit Query">';
            echo "</td>";
        echo "</tr>";
    echo "</table>";
    echo "</form>";
}
formulario($estructura_formulario);
?>
</table>
</body>
</html>