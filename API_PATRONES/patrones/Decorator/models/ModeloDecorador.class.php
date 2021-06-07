<?php
namespace Decorator;


require_once 'Decorador.class.php';
require_once 'ComponenteGraficoVehiculo.class.php';

class ModeloDecorador extends Decorador
{

    /**
     *
     * @param ComponenteGraficoVehiculo $componente            
     */
    public function __construct(ComponenteGraficoVehiculo $componente)
    {
        parent::__construct($componente);
    }

    public function muestraInfosTecnicas()
    {
       return 'Informaci�n tecnica del modelo';
    }

    public function muestra()
    {
    
        return  array('MuestraDecorador' =>  parent::muestra(),
        'MuestraInfosTecnicas' => $this->muestraInfosTecnicas());
    }
}

?>
