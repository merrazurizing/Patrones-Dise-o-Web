<?php
namespace models;

require_once 'EstadoSolicitud.php';

class Pagado extends EstadoSolicitud
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
    //Se define funcion que retorna el estado actual
    public function estadoSiguente(){
 		return $this;
 	}
    public function getEstado(){
        return "Pagado";
    }  

    public function cancelar(){
        return "No se puede cancelar";
    }

}

?>
