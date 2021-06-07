<?php
namespace TemplateMethod;


abstract class Pedido
{
    /**
     * 
     * @var double
     */
    protected $cantidadSinIVA;
    /**
     * 
     * @var double
     */
    protected $cantidadIVA;
    /**
     * 
     * @var double
     */
    protected $cantidadConIVA;

    /**
     * @return void
     */
    protected abstract function calculaIVA();

    public function calculaCantidadConIVA()
    {
        $this->calculaIVA();
        $this->cantidadConIVA = $this->cantidadSinIVA + $this->cantidadIVA;
    }

    /**
     * 
     * @param double $cantidadSinIVA
     */
    public function setCantidadSinIVA($cantidadSinIVA)
    {
        $this->cantidadSinIVA = $cantidadSinIVA;
    }

    public function muestra()
    {
      
                return Array("Pedido"=> Array("Cantidad sin IVA"=>number_format($this->cantidadSinIVA, 2, ',', ' '),
                "Cantidad con IVA"=>number_format($this->cantidadConIVA, 2, ',', ' ')));
    }
}


?>
