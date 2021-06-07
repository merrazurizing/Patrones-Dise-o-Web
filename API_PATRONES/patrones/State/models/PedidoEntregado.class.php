<?php
namespace State;

require_once 'Pedido.class.php';
require_once 'Producto.class.php';
require_once 'EstadoPedido.class.php';

class PedidoEntregado extends EstadoPedido
{
    /**
     * 
     * @param Pedido $pedido
     */
    public function __construct(Pedido $pedido)
    {
        parent::__construct($pedido);
    }

    public function agregaProducto(Producto $producto){}

    public function elimina(){}

    public function retiraProducto(Producto $producto){}

    public function estadoSiguiente()
    {
        return $this;
    }
}


?>
