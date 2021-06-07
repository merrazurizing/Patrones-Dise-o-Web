<?php
namespace Strategy;

require_once 'DibujaCatalogo.class.php';
require_once 'ListaVistaVehiculo.class.php';

class DibujaTresVehiculosLinea implements DibujaCatalogo
{

    /**
     * @param ListaVistaVehiculo $contenido
     */
    public function dibuja(ListaVistaVehiculo $contenido)
    {
   
                $resp=Array();
        $contador = 0;
        foreach ($contenido as $vistaVehiculo)
        {
            $resp[]= $vistaVehiculo->dibuja();
            $contador++;
            if ($contador === 3)
            {
          
                $resp[]="";
                $contador = 0;
            }
            else
            {
                $resp[]=" - ";

               
            }
        }
        if ($contador !== 0)
        {
           
            $resp[]="";

        }
     
      return Array('Dibuja los veh�culos con tres veh�culos por linea'=>$resp);

    }
}


?>
