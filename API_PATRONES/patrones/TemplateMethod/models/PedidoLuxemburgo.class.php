<?php
namespace TemplateMethod;

require_once 'Pedido.class.php';

class PedidoLuxemburgo extends Pedido
{
    protected function calculaIVA()
    {
        $this->cantidadIVA = $this->cantidadSinIVA * 0.15;
    }
}


?>
