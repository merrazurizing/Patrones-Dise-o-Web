<?php
namespace models;

require_once 'EstadoSolicitud.php';

class PedidoEnEspera extends EstadoSolicitud
{
/**
     *
     * @param array(string) $listaComida
     * @param string $tipoPedido
     *            
     */ 
    public function __construct($listaComida,$tipoPedido) {
        parent::__construct($listaComida, $tipoPedido);
        $this->updateEstado();
     }
     //Se define funcion que crea un objeto del estado siguiente
 	public function estadoSiguente(){
 		return new PedidoEntregado($this->listaComida,$this->tipoPedido);
 	}

    public function getEstado(){
        return "Pedido en Espera";
    }

    public function cancelar(){
        return "Cancelado";        
    }

}

?>
