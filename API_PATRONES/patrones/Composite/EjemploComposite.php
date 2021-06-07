<?php

namespace Composite;

use Exception;


require_once 'models/EmpresaSinFilial.class.php';
require_once 'models/EmpresaMatriz.class.php';
class EjemploComposite
{



    public function __construct()
    {

     
    }

    public function generar()
    {
        try {

          

            $empresa1 = new EmpresaSinFilial();
            $empresa1->agregaVehiculo();
            
            $empresa2 = new EmpresaSinFilial();
            $empresa2->agregaVehiculo();
            $empresa2->agregaVehiculo();
            
            $grupo = new EmpresaMatriz();
            $grupo->agregaFilial($empresa1);
            $grupo->agregaFilial($empresa2);
            $grupo->agregaVehiculo();
            $r=array(
                'Coste de mantenimiento total del grupo' =>  number_format($grupo->calculaGastoMantenimiento(), 
                2, ',', ' '),
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
