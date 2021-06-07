<?php
namespace ChainOfResponsibility;

require_once 'ObjetoBase.class.php';

class Modelo extends ObjetoBase
{
    /**
     * 
     * @var string
     */
    protected $descripcion;
    /**
     * 
     * @var string
     */
    protected $nombre; 
    
    /**
     *
     * @param string $nombre            
     * @param string $descripcion            
     */
    public function __construct($nombre, $descripcion=null)
    {
        $this->descripcion = $descripcion;
        $this->nombre = $nombre;
    }

    protected function getDescripcion()
    {
        if (isset($this->descripcion)) {
            return "Modelo $this->nombre : $this->descripcion";
        } 
        else
        {
            return null;
        }
    }
}

?>
