<?php

namespace Visitor;

use Exception;

require_once 'models/EmpresaSinFilial.class.php';
require_once 'models/EmpresaMatriz.class.php';
require_once 'models/VisitanteMailingComercial.class.php';

class EjemploVisitor
{



    public function __construct()
    {

     
    }

    public function generar()
    {
        try {

          

            $empresa1 = new EmpresaSinFilial('empresa1', 'info@empresa1.com', 'calle de la empresa 1');
            $empresa2 = new EmpresaSinFilial('empresa2', 'info@empresa2.com', 'calle de la empresa 2');
            $grupo1 = new EmpresaMatriz('grupo1', 'info@grupo1.com', 'calle del grupo 1');
            $grupo1->agregaFilial($empresa1);
            $grupo1->agregaFilial($empresa2);
            
            $empresa3 = new EmpresaSinFilial('empresa3', 'info@empresa3.com', 'calle de la empresa 3');
            $grupo2 = new EmpresaMatriz('grupo2', 'info@grupo2.com', 'calle del grupo 2');
            $grupo2->agregaFilial($grupo1);
            $grupo2->agregaFilial($empresa3);
            $r=$grupo2->aceptaVisitante(new VisitanteMailingComercial());
         
            
        
           
          
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
