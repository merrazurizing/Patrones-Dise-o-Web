<?php
namespace Decorator;


require_once 'Decorador.class.php';
require_once 'ComponenteGraficoVehiculo.class.php';

class MarcaDecorador extends Decorador
{

    /**
     *
     * @param ComponenteGraficoVehiculo $componente            
     */
    public function __construct(ComponenteGraficoVehiculo $componente)
    {
        parent::__construct($componente);
    }

    public function muestraLogo()
    {
        return 'Logo de la marca';
    }

    public function muestra()
    {
       
        return  array('MuestraDecorador' =>  parent::muestra(),
        'MuestrLogo' => $this->muestraLogo());
    }
}

?>
