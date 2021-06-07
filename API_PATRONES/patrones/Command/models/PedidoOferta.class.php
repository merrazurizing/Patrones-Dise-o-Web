<?php
namespace Command;

require_once 'ListaVehiculo.class.php';

class PedidoOferta
{
    /**
     * 
     * @var ListaVehiculo
     */
    protected $vehiculosOferta;
    /**
     * 
     * @var long
     */
    protected $hoy; 
    /**
     * 
     * @var long
     */
    protected $duracionStock; 
    /**
     * 
     * @var double
     */
    protected $tasaDescuento;
    
    /**
     *
     * @param long $hoy            
     * @param long $duracionStock            
     * @param double $tasaDescuento            
     */
    public function __construct($hoy, $duracionStock, 
            $tasaDescuento)
    {
        $this->vehiculosOferta = new ListaVehiculo();
        $this->hoy = $hoy;
        $this->duracionStock = $duracionStock;
        $this->tasaDescuento = $tasaDescuento;
    }

    /**
     *
     * @param ListaVehiculo $vehiculos
     */
    public function oferta(ListaVehiculo $vehiculos)
    {
        $this->vehiculosOferta = new ListaVehiculo();
        foreach ($vehiculos as $vehiculo)
        {
            if ($vehiculo->getDuracionAlmacenamiento($this->hoy) >=
                     $this->duracionStock)
            {
                $this->vehiculosOferta->append($vehiculo);
            }
        }
        foreach ($this->vehiculosOferta as $vehiculo)
        {
            $vehiculo->modificaPrecio(1.0 - $this->tasaDescuento);
        }
    }

    public function anula()
    {
        foreach ($this->vehiculosOferta as $vehiculo)
        {
            $vehiculo->modificaPrecio(
                    1.0 / (1.0 - $this->tasaDescuento));
        }
    }

    public function restablece()
    {
        foreach ($this->vehiculosOferta as $vehiculo)
        {
            $vehiculo->modificaPrecio(1.0 - $this->tasaDescuento);
        }
    }
}

?>
