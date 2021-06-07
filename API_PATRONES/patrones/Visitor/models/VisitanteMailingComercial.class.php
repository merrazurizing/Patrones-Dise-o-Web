<?php
namespace Visitor;

require_once 'Visitante.class.php';
require_once 'EmpresaSinFilial.class.php';
require_once 'EmpresaMatriz.class.php';


class VisitanteMailingComercial implements Visitante
{

    public function visitaEmpresaSinFilial(
                     EmpresaSinFilial $empresa)
    {
 
                 return Array("Envía un email a"=>$empresa->getNombre(),
                 "dirección"=>$empresa->getEmail(),
                 "Descripción"=> ' Propuesta comercial para su empresa');
    }

    public function visitaEmpresaMatriz(EmpresaMatriz $empresa)
    {

                $resp[]=  Array("Envía un email a"=>$empresa->getNombre(),
                 "Email"=>$empresa->getEmail(),
                 "Descripción"=> ' Propuesta comercial para su grupo');

                 $resp[]=  Array("Impresi�n de un correo a"=>$empresa->getNombre(),
                 "Dirección"=>$empresa->getDireccion(),
                 "Descripción"=> ' Propuesta comercial para su grupo');
                 return $resp;
                }
}

?>
