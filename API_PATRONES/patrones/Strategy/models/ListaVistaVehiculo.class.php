<?php
namespace Strategy;

require_once 'VistaVehiculo.class.php';


class ListaVistaVehiculo implements \IteratorAggregate {
    
    /**
     * 
     * @var \ArrayObject
     */
    private $vistasVehiculo;
    
    public function __construct(){
        $this->vistasVehiculo = new \ArrayObject();
    }
    
    public function append (VistaVehiculo $valor ) {
        $this->vistasVehiculo->append($valor);
    }
    
    public function getIterator () {
        return $this->vistasVehiculo->getIterator();
    }
}

?>
