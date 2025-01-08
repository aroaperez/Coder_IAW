<?php
class Persona {
    public $nombre;
    public function __construct($nombre) {
        $this->nombre = $nombre;
    }
}
function cambiarNombre($persona) {
    $persona->nombre = "Carlos";
}
$persona1 = new Persona("Ana");
cambiarNombre($persona1);
echo $persona1->nombre; // Imprime "Carlos", no "Ana"
?>