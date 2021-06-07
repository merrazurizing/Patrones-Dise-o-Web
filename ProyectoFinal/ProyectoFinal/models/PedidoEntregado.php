<?php
namespace models;

require_once 'EstadoSolicitud.php';

class PedidoEntregado extends EstadoSolicitud
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
        
        if($this->tipoPedido == "Servir"){
            return new Consumiendo($this->listaComida,$this->tipoPedido);    
        }else{
            return new PorPagar($this->listaComida,$this->tipoPedido); 
        }
        
 		
 	}

    public function getEstado(){
        return "Pedido Entregado";
    }  

    public function cancelar(){
        return "Cancelado";
    }

}

?>
