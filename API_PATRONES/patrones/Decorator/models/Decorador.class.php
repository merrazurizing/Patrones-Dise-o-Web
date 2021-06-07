<?php
namespace Decorator;

require_once 'ComponenteGraficoVehiculo.class.php';

abstract class Decorador implements ComponenteGraficoVehiculo
{
    /**
     * 
     * @var ComponenteGraficoVehiculo
     */
    public $componente;
    
    /**
     *
     * @param ComponenteGraficoVehiculo $componente            
     */
    public function __construct(ComponenteGraficoVehiculo $componente)
    {
        $this->componente = $componente;
    }

    public function muestra()
    {
        return $this->componente->muestra();
    }
}
?>
