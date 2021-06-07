<?php
namespace Memento;

require_once 'OpcionVehiculo.class.php';

class ListaOpcionVehiculo implements \IteratorAggregate
{
    
    /**
     *
     * @var \ArrayObject
     */
    private $opcions;
    
    public function __construct() {
        $this->opciones = new \ArrayObject();
    }
    
    public function clear()
    {
        $this->opciones = new \ArrayObject();
    }

    /**
     * 
     * @param OpcionVehiculo $opcion
     */
    public function add(OpcionVehiculo $opcion)
    {
        $this->opciones->append($opcion);
    }

    /**
     * 
     * @param ListaOpcionVehiculo $opcions
     */
    public function addAll(ListaOpcionVehiculo $opcions)
    {
        if (isset($opcions)) {
            foreach($opcions as $o) {
                $this->opciones->append($o);
            }
        }
    }
    
    /**
     * 
     * @param OpcionVehiculo $opcion
     */
    public function remove(OpcionVehiculo $opcion) {
        foreach ($this->opciones as $key => $val) {
            if ($val == $opcion) {
                $this->opciones->offsetUnset($key);
                break;
            }
        }
    }
    
    /**
     * 
     * @param ListaOpcionVehiculo $opcions
     */
    public function removeAll(ListaOpcionVehiculo $opcions) {
        foreach ($opcions as $opcion) {
            $this->remove($opcion);
        }
    }
    
    /**
     * 
     * @param OpcionVehiculo $opcion
     * @return boolean
     */
    public function contains(OpcionVehiculo $opcion) {
        foreach ($this->opciones as $key => $val) {
            if ($val == $opcion) {
                return true;
            }
        }
        return false;
    }
    
    public function getIterator () {
        return $this->opciones->getIterator();
    }
}

?>
