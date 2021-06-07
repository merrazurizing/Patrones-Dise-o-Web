<?php
namespace Visitor;

require_once 'EmpresaSinFilial.class.php';
require_once 'EmpresaMatriz.class.php';

interface Visitante
{
    /**
     * 
     * @param EmpresaSinFilial $societe
     */
    function visitaEmpresaSinFilial(EmpresaSinFilial $empresa);
    
    /**
     * 
     * @param EmpresaMatriz $empresa
     */
    function visitaEmpresaMatriz(EmpresaMatriz $empresa);
}


?>
