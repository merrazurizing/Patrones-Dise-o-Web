<?php
namespace Command;

require_once 'ListaVehiculo.class.php';

class Catalogo
{
    /**
     * 
     * @var ListaVehiculo
     */
    protected $vehiculosStock;
    /**
     * 
     * @var "Lista de PedidoOferta"
     */
    protected $pedidos = array();
    
    public function __construct() {
        $this->vehiculosStock = new ListaVehiculo();
    }
    
    /**
     *
     * @param PedidoOferta $pedido            
     */
    public function lanzaPedidoOferta(PedidoOferta $pedido)
    {
        array_unshift($this->pedidos, $pedido); 
        $pedido->oferta($this->vehiculosStock);
    }

    /**
     *
     * @param int $orden            
     */
    public function anulaPedidoOferta($orden)
    {
        $this->pedidos[$orden]->anula();
    }

    /**
     *
     * @param int $orden            
     */
    public function restablecePedidoOferta($orden)
    {
        $this->pedidos[$orden]->restablece();
    }

    /**
     *
     * @param Vehiculo $vehiculo            
     */
    public function agrega(Vehiculo $vehiculo)
    {
        $this->vehiculosStock->append($vehiculo);
    }

    public function muestra()
    {
        $r=[];
        foreach ($this->vehiculosStock as $vehiculo)
        {
            $r[]= $vehiculo->muestra();
        }

        return $r;
    }
}

?>
