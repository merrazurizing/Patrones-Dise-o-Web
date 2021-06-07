<?php
namespace ChainOfResponsibility;

abstract class ObjetoBase
{
    /**
     * 
     * @var ObjetoBase
     */
    protected $siguiente;
    
    /**
     * @return string
     */
    private function descripcionporDefecto()
    {
        return 'descripci�n por defecto';
    }
    
    /**
     * @return NULL|string
     */
    protected abstract function getDescripcion();
    
    /**
     * @return string
     */
    public function daDescripcion()
    {
        $resultado = $this->getDescripcion();
        if (isset($resultado))
        {
            return $resultado;
        }
        if (isset($this->siguiente))
        {
            return $this->siguiente->daDescripcion();
        }
        else
        {
            return $this->descripcionporDefecto();
        }
    }

    /**
     *
     * @param ObjetoBase $siguiente            
     */
    public function setSiguiente(ObjetoBase $siguiente)
    {
        $this->siguiente = $siguiente;
    }
}

?>
