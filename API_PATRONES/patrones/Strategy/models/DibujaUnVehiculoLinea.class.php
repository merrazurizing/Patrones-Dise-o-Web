<?php
namespace Strategy;

require_once 'DibujaCatalogo.class.php';
require_once 'ListaVistaVehiculo.class.php';


class DibujaUnVehiculoLinea implements DibujaCatalogo
{

    /**
     * 
     * @param ListaVistaVehiculo $contenido
     */
    public function dibuja(ListaVistaVehiculo $contenido)
    {
     
            $resp=Array();
        foreach ($contenido as $vistaVehiculo)
        {
            $resp[]=$vistaVehiculo->dibuja();
          
            $resp[]="-";
        }


      return Array("Dibuja los veh�culos con un veh�culo por l�nea"=>$resp);
    }
}


?>
