<?php
namespace Command;


class Vehiculo
{
    /**
     * 
     * @var string
     */
    protected $nombre;
    /**
     * 
     * @var long
     */
    protected $fechaEntradaStock; 
    /**
     * 
     * @var double
     */
    protected $precioVenta; 
    
    /**
     *
     * @param string $nombre            
     * @param long $fechaEntradaStock            
     * @param double $precioVenta            
     */
    public function __construct($nombre, $fechaEntradaStock, 
            $precioVenta)
    {
        $this->nombre = $nombre;
        $this->fechaEntradaStock = $fechaEntradaStock;
        $this->precioVenta = $precioVenta;
    }

    /**
     *
     * @param long $hoy            
     * @return long
     */
    public function getDuracionAlmacenamiento($hoy)
    {
        return $hoy - $this->fechaEntradaStock;
    }

    /**
     *
     * @param double $coeficiente            
     */
    public function modificaPrecio($coeficiente)
    {
        $this->precioVenta = round(
                $coeficiente * $this->precioVenta, 2);
    }

    public function muestra()
    {
       return "$this->nombre  precio : " .
                number_format($this->precioVenta, 2, ',', ' ') .
                " fecha entrada en Stock $this->fechaEntradaStock";
                
    }
}

?>
