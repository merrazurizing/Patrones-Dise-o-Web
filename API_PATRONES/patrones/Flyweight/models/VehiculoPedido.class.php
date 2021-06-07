<?php
namespace Flyweight;


require_once 'FabricaOption.class.php';

class VehiculoPedido
{
    /**
     * 
     * @var "Lista de OpcionVehiculo"
     */
    protected $opcions = array();
    /**
     * 
     * @var "Lista de int"
     */
    protected $precioDeVentaOpciones = array();
    
    /**
     *
     * @param string $nombre            
     * @param int $precioDeVenta            
     * @param FabricaOption $fabrica            
     */
    public function agregaOpciones($nombre, $precioDeVenta,
                                     FabricaOption $fabrica)
    {
        $this->opciones[] = $fabrica->getOpcion($nombre);
        $this->precioDeVentaOpciones[] = $precioDeVenta;
    }

    
    public function muestraOptions()
    {
        $resp=[];
        foreach ($this->opciones as $indice => $opcion)
        {
            $resp=$opcion->muestra($this->precioDeVentaOpciones[$indice]);
         
        }
    return $resp;
        
    }
}

?>
