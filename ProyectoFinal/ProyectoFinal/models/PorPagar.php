<?php
namespace models;

require_once 'EstadoSolicitud.php';

class PorPagar extends EstadoSolicitud
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
 		return new Pagado($this->listaComida,$this->tipoPedido);
     }
    public function getEstado(){
        return "Por pagar";
    }  

    public function cancelar(){
        return "No se puede cancelar";
    }

}

?>
