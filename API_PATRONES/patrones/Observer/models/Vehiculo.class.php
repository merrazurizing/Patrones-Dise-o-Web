<?php
namespace Observer;

require_once 'Asunto.class.php';

class Vehiculo extends Asunto
{
    /**
     * 
     * @var string
     */
    protected $descripcion;
    /**
     * 
     * @var double
     */
    protected $precio;
    
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     *
     * @param string $descripcion            
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
        $this->notifica();
    }

    /**
     *
     * @return double
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     *
     * @param double $precio            
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
        $this->notifica();
    }
}

?>
