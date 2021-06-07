<?php

namespace Command;

use Exception;

require_once 'models/Vehiculo.class.php';
require_once 'models/Catalogo.class.php';
require_once 'models/PedidoOferta.class.php';

class EjemploCommand
{



    public function __construct()
    {

     
    }

    public function generar()
    {
        try {

          

            $vehiculo1 = new Vehiculo('A01', 1, 1000.0);
            $vehiculo2 = new Vehiculo('A11', 6, 2000.0);
            $vehiculo3 = new Vehiculo('Z03', 2, 3000.0);
            
            $catalogo = new Catalogo();
            $catalogo->agrega($vehiculo1);
            $catalogo->agrega($vehiculo2);
            $catalogo->agrega($vehiculo3);

            $pedidoOferta = new PedidoOferta(10, 5, 0.1);
            $catalogo->lanzaPedidoOferta($pedidoOferta);
        
            $pedidoOferta2 = new PedidoOferta(10, 5, 0.5);
            $catalogo->lanzaPedidoOferta($pedidoOferta2);

            $catalogo->anulaPedidoOferta(1);

            $catalogo->restablecePedidoOferta(1);

            $r = array('cat�logo inicial' =>$catalogo->muestra(),
            'cat�logo despu�s de la ejecuci�n del primer pedido' => $catalogo->muestra(),
            'at�logo despu�s de la ejecuci�n del segundo pedido' => $catalogo->muestra(),
            'cat�logo despu�s de eliminar el primer pedido' => $catalogo->muestra(),
            'cat�logo despu�s de restablecer el primer pedido' => $catalogo->muestra()
        );
          
            $respuesta = array('Estado' => "success",
                'Response' => $r);
            return $respuesta;
        } catch (Exception $e) {
            $respuesta = array('Estado' => "Error",
                'Response' => $e->getMessage());
            return $respuesta;
        }
    }

}
