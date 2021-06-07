<?php
namespace State;

require_once 'Producto.class.php';

class ListaProducto implements \IteratorAggregate
{
    
    /**
     *
     * @var \ArrayObject
     */
    protected $productos;

    public function __construct() {
        $this->productos = new  \ArrayObject();
    }
    
    /**
     * 
     * @param Producto $producto
     */
    public function add(Producto $producto)
    {
        $this->productos->append($producto);
    }
    
    /**
     * 
     */
    public function clear() {
        $this->productos = new  \ArrayObject();
    }

    /**
     * 
     * @param Producto $producto
     */
    public function remove(Producto $producto) {
        foreach ($this->productos as $key => $val) {
            if ($val == $producto) {
                $this->productos->offsetUnset($key);
                break;
            }
        }
    }
    
    public function getIterator () {
        return $this->productos->getIterator();
    }
}

?>
