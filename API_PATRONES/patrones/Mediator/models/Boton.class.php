<?php
namespace Mediator;


require_once 'Control.class.php';

class Boton extends Control
{

    /**
     *
     * @param string $nombre            
     */
    public function __construct($nombre)
    {
        parent::__construct($nombre);
    }

    /**
     *
     * @return void
     */
    public function entradaDatos()
    {

        if ($this->nombre === 'OK')
        {
            $this->modifica();
        }

        return "�Quiere activar el bot�n ". $this->nombre ."(s�/no)?: ";
    }
}

?>
