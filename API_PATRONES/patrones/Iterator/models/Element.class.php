<?php
namespace Iterator;

abstract class Element
{
    /**
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
     *
     * @param string $palabraClave            
     * @return boolean
     */
    public function palabraClaveValida($palabraClave)
    {
        return strstr($this->descripcion, $palabraClave) !== FALSE;
    }
}

?>
