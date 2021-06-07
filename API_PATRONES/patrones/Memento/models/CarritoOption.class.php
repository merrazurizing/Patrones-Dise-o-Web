<?php
namespace Memento;


require_once 'OpcionVehiculo.class.php';
require_once 'Memento.class.php';
require_once 'MementoImpl.class.php';

class CarritoOption
{
    /**
     * @var ListaOpcionVehiculo
     */
    protected $opcions;

    public function __construct()
    {
        $this->opciones = new ListaOpcionVehiculo();
    }
    
    /**
     * 
     * @param OpcionVehiculo $opcionVehiculo
     * @return Memento
     */
    public function agregaOption(OpcionVehiculo
            $opcionVehiculo)
    {
        $resultado = new MementoImpl();
        $resultado->setEstado($this->opciones);
        $this->opciones->removeAll(
         $opcionVehiculo->getOpcionsIncompatibles());
        $this->opciones->add($opcionVehiculo);
        return $resultado;
    }

    /**
     * 
     * @param Memento $memento
     */
    public function anula(Memento $memento)
    {
        if (method_exists($memento, 'getEstado')) {
            $this->opciones = $memento->getEstado();
        }
    }

    /**
     * @return void
     */
    public function muestra()
    {

        $resp=[];
        foreach ($this->opciones as $opcion) {
            $resp[]= $opcion->muestra();
        }

        return array("Contenido del carrito de opciones"=>$resp);
    }
}

?>
