<?php
namespace Bridge;

require_once 'FormularioMatriculacion.class.php';

class FormMatriculacionEspana extends FormularioMatriculacion
{
    const NUM_CARACTERES = 7;

    /**
     *
     * @param FormularioImpl $implantacion            
     */
    public function __construct($implantacion)
    {
        parent::__construct($implantacion);
    }

    protected function controlEntrada($matricula)
    {
        return strlen($matricula) == 
        FormMatriculacionEspana::NUM_CARACTERES;
    }

    protected function getRestriccion()
    {
        return FormMatriculacionEspana::NUM_CARACTERES . 
            ' car.';
    }
}

?>
