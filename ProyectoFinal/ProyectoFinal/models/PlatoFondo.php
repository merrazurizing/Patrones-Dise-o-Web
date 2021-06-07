<?php
namespace models;
require_once 'Comida.php';
abstract class PlatoFondo extends Comida
{
    /**
     *
     * @param string $nombre
     * @param array(string) $receta
     * @param int $cantidad
     * @param string $precio
     *            
     */ 
    public function __construct($nombre, $receta, $cantidad,$precio)
    {
        parent::__construct($nombre, $receta, $cantidad,$precio);
    }
    public abstract function descontarIngredienteInventario();
}

?>
