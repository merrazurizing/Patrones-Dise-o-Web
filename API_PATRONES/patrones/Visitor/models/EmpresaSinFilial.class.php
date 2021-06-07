<?php
namespace Visitor;

require_once 'Empresa.class.php';
require_once 'Visitante.class.php';

class EmpresaSinFilial extends Empresa
{
    /**
     * 
     * @param string $nombre
     * @param string $email
     * @param string $direccion
     */
    public function __construct($nombre, $email, $direccion)
    {
        parent::__construct($nombre, $email, $direccion);
    }

    public function aceptaVisitante(Visitante $visitante)
    {
        $visitante->visitaEmpresaSinFilial($this);
    }

    public function agregaFilial(Empresa $filial)
    {
        return false;
    }

}

?>
