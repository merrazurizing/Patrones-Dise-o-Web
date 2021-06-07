<?php
namespace models;

require_once 'EstadoSolicitud.php';

class Consumiendo extends EstadoSolicitud
{
	
 	public function __construct($listaComida,$tipoPedido) {
       parent::__construct($listaComida, $tipoPedido);
       $this->updateEstado();
    }

    /**
     *
     * @param string[] $listaComida                   
     * @param TipoSolicitud $tipoPedido           
     */
    //Se define funcion que crea un objeto del estado definido como siguiente.
 	public function estadoSiguente(){
 		return new PorPagar($this->listaComida,$this->tipoPedido);
 	}

    public function getEstado(){
        return "Consumiendo";
    }  

    public function cancelar(){
        return "No se puede cancelar";
    }
}

?>
