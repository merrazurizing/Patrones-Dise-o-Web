<?php
namespace Strategy;

require_once 'ListaVistaVehiculo.class.php';

interface DibujaCatalogo
{
    /**
     * 
     * @param ListaVistaVehiculo $contenido
     */
    function dibuja(ListaVistaVehiculo $contenido);
}


?>
