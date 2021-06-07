<?php
namespace ChainOfResponsibility;

require_once 'ObjetoBase.class.php';

class Marca extends ObjetoBase
{
    /**
     * 
     * @var string
     */
    protected $descripcion1;
    /**
     * 
     * @var string
     */
    protected $descripcion2;
    /**
     * 
     * @var string
     */
    protected $nombre;
    
    /**
     *
     * @param string $nombre            
     * @param string $descripcion1            
     * @param string $descripcion2            
     */
    public function __construct($nombre, $descripcion1, 
            $descripcion2)
    {
        $this->descripcion1 = $descripcion1;
        $this->descripcion2 = $descripcion2;
        $this->nombre = $nombre;
    }

    protected function getDescripcion()
    {
        if ((isset($this->descripcion1)) &&
                 (isset($this->descripcion2)))
        {
            return "Marca $this->nombre :  $this->descripcion1 " .
                $this->descripcion2;
        }
        else
        {
            if (isset($this->descripcion1))
            {
                return 'Marca ' + $this->nombre + ' : ' +
                         $this->descripcion1;
            }
            else
            {
                return null;
            }
        }
    }
}

?>
