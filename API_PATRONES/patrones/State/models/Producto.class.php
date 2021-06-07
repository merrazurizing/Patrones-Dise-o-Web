<?php
namespace State;

class Producto
{
    /**
     * 
     * @var string
     */
    protected $nombre;

    /**
     * 
     * @param string $nombre
     */
    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    public function muestra()
    {


        return "Producto:".$this->nombre;
    }
}


?>
