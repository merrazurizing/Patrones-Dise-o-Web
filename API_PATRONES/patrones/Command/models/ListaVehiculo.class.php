<?php
namespace Command;

require_once 'Vehiculo.class.php';

class ListaVehiculo implements \IteratorAggregate {
    
    /**
     * 
     * @var \ArrayObject
     */
    private $vehiculos;
    
    public function __construct(){
        $this->vehiculos = new \ArrayObject();
    }
    
    /**
     * 
     * @param Vehiculo $vehiculo
     */
    public function append (Vehiculo $vehiculo) {
        $this->vehiculos->append($vehiculo);
    }
    
    public function getIterator () {
        return $this->vehiculos->getIterator();
    }
}

?>
