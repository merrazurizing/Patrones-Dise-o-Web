<?php
namespace Visitor;

require_once 'Empresa.class.php';
require_once 'Visitante.class.php';

class EmpresaMatriz extends Empresa
{
    /**
     * 
     * @var "Lista de Empresa"
     */
    public $filiales = array();

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
        $visitante->visitaEmpresaMatriz($this);
        foreach ($this->filiales as $filial)
        {
            $filial->aceptaVisitante($visitante);
        }
    
        return $this->filiales;
    }

    public function agregaFilial(Empresa $filial)
    {
        return $this->filiales[] = $filial;
    }
}


?>
