<?php
namespace Strategy;



class VistaVehiculo
{
    /**
     * 
     * @var string
     */
    protected $descripcion;

    /**
     * 
     * @param string $descripcion
     */
    public function __construct($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return void
     */
    public function dibuja()
    {
       
        return $this->descripcion;
    }
}


?>
