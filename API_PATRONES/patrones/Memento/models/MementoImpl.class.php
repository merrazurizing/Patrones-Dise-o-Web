<?php
namespace Memento;

require_once 'Memento.class.php';
require_once 'ListaOpcionVehiculo.class.php';

class MementoImpl implements Memento
{
    /**
     * @var ListaOpcionVehiculo
     */
    protected $opcions;

    
    public function __construct() {
        $this->opciones = new ListaOpcionVehiculo();
    }
    
    /**
     * 
     * @param ListaOpcionVehiculo $opcions
     */
    public function setEstado(ListaOpcionVehiculo $opcions)
    {
        $this->opciones->clear();
        $this->opciones->addAll($opcions);
    }

    /**
     * 
     * @return ListaOpcionVehiculo
     */
    public function getEstado()
    {
        return $this->opciones;
    }
}


?>
