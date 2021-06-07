<?php
namespace Mediator;

require_once 'Control.class.php';


class ZonaEntradaDatos extends Control
{
    /**
     * 
     * @param string $nombre
     */
    public function __construct($nombre)
    {
        parent::__construct($nombre);
    }

    public function entradaDatos()
    {
    
        $this->modifica();
        return "Introduzca <".$this->nombre."> : ";
    }
}

?>
