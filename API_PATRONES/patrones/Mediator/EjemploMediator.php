<?php

namespace Mediator;

use Exception;

require_once 'models/Formulario.class.php';
require_once 'models/ZonaEntradaDatos.class.php';
require_once 'models/PopupMenu.class.php';
require_once 'models/Boton.class.php';

class EjemploMediator
{



    public function __construct()
    {

        //var_dump("ENTROOOO");
    }

    public function generar()
    {
        try {

           // $r= array();

            $formulario = new Formulario();
        

            $formulario->agregaControl(new ZonaEntradaDatos('Nombre'));
           
            $formulario->agregaControl(new ZonaEntradaDatos('Apellidos'));
            $menu = new PopupMenu('Codeudor');
            $menu->agregaOption('sin codeudor');
            $menu->agregaOption('con codeudor');
           
            $formulario->agregaControl($menu);
            $formulario->setMenuCodeudor($menu);
          
            $boton = new Boton('OK');
            $formulario->agregaControl($boton);
        

            $formulario->setBotonOK($boton);
           
            $formulario->agregaControlCodeudor(new ZonaEntradaDatos('Nombre del codeudor'));
            $formulario->agregaControlCodeudor(new ZonaEntradaDatos('Apellidos del codeudor'));
     
            $r= Array ( 'formulario'=>$formulario->entradaDatos());
   
            
        
           
          
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
