<?php
namespace Strategy;

require_once 'DibujaCatalogo.class.php';
require_once 'VistaVehiculo.class.php';
require_once 'ListaVistaVehiculo.class.php';

class VistaCatalogo
{
    /**
     * 
     * @var ListaVistaVehiculo
     */
    protected $contenido;
    /**
     * 
     * @var DibujaCatalogo
     */
    protected $dibuja;

    /**
     * 
     * @param DibujaCatalogo $dibuja
     */
    public function __construct(DibujaCatalogo $dibuja)
    {
        $this->contenido = new ListaVistaVehiculo();
        $this->contenido->append(
          new VistaVehiculo('veh�culo barato'));
        $this->contenido->append(
          new VistaVehiculo('veh�culo amplio'));
        $this->contenido->append(
          new VistaVehiculo('veh�culo r�pido'));
        $this->contenido->append(
          new VistaVehiculo('veh�culo confortable'));
        $this->contenido->append(
         new VistaVehiculo('veh�culo deportivo'));
      
        $this->dibuja = $dibuja;
    }

    public function dibuja()
    {  
       return $this->dibuja->dibuja($this->contenido);
    }
}


?>
