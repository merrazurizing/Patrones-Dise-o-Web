<?php
namespace Iterator;

require_once 'Element.class.php';

class Vehiculo extends Element
{
    /**
     * 
     * @param string $descripcion
     */
    public function __construct($descripcion)
    {
        parent::__construct($descripcion);
    }

    public function muestra()
    {
        return array('Descripci�n del veh�culo :' => $this->descripcion);
              
    }
}
?>
