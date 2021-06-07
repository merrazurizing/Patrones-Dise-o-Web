<?php
namespace Flyweight;


class OpcionVehiculo
{
    /**
     * 
     * @var string
     */
    protected $nombre;
    /**
     * 
     * @var string
     */
    protected $descripcion;
    /**
     * 
     * @var int
     */
    protected $precioEstandar; 
    
    /**
     *
     * @param string $nombre            
     */
    public function __construct($nombre)
    {
        $this->nombre = $nombre;
        $this->descripcion = "Descripci�n de $nombre";
        $this->precioEstandar = 100;
    }

    /**
     *
     * @param int $precioDeVenta            
     */
    public function muestra($precioDeVenta)
    {
        
        return array(
            'Tipo' =>  "Opcion",
            'Nombre' =>  $this->nombre,
            'descripcion' =>  $this->descripcion,
            'precioEstandar' =>  $this->precioEstandar,
          
        
        );
    }
}

?>
