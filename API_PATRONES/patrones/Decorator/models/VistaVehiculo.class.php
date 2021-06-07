<?php
namespace Decorator;


require_once 'ComponenteGraficoVehiculo.class.php';

class VistaVehiculo implements ComponenteGraficoVehiculo
{

    public function muestra()
    {
      
        return 'Muestra del veh�culo';
    }
}

?>
