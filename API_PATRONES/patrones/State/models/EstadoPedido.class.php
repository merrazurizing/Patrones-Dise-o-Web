<?php
namespace State;

require_once 'Pedido.class.php';
require_once 'Producto.class.php';

abstract class EstadoPedido
{
    /**
     * 
     * @var Pedido
     */
    protected $pedido;

    /**
     * 
     * @param Pedido $pedido
     */
    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }

    /**
     * 
     * @param Producto $producto
     */
    public abstract function agregaProducto(Producto $producto);
    
    /**
     * @return void
     */
    public abstract function elimina();
    
    /**
     * 
     * @param Producto $producto
     */
    public abstract function retiraProducto(Producto $producto);
    
    /**
     * @return EstadoPedido
     */
    public abstract function estadoSiguiente();
}


?>
