<?php
namespace models;

require_once 'EstadoSolicitud.php';

class IniciarSolicitud extends EstadoSolicitud
{
	
    /**
     *
     * @param array(string) $listaComida
     * @param string $tipoPedido
     *            
     */ 
	public function __construct($listaComida,$tipoPedido) {
	   parent::__construct($listaComida, $tipoPedido);
    }
    //Se define funcion que crea un objeto del estado siguiente
 	public function estadoSiguente(){
 		return new PedidoEnEspera($this->listaComida,$this->tipoPedido);
 	}

    public function getEstado(){
        return "Iniciar Solicitud"; 
    }

    public function cancelar(){
        return "Cancelado";
        //sql cambiar estado de solicutud :v
    }

}

?>
