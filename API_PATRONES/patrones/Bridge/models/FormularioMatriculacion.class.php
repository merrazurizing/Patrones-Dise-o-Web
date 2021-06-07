<?php
namespace Bridge;

require_once 'FormularioImpl.class.php';

abstract class FormularioMatriculacion
{
    /**
     * 
     * @var string
     */
    protected $contenido;
    /**
     * 
     * @var FormularioImpl
     */
    protected $implantacion;

    /**
     *
     * @param FormularioImpl $implantacion            
     */
    public function __construct(FormularioImpl $implantacion)
    {
        $this->implantacion = $implantacion;
    }

    public function muestra()
    {
        return $this->implantacion->dibujaTexto(
                'n�mero de matricula actual (' .
                 $this->getRestriccion() . ') : ');

    }

    public function generaDocumento()
    {
        $this->implantacion->dibujaTexto(
                'Solicitud de matriculacion');
                return $this->implantacion->dibujaTexto(
                "numero de matricula : $this->contenido");
                
    }

    
    /**
     * 
     * @return boolean
     */
    public function gestionaEntrada($texto)
    {
        $this->contenido = $this->implantacion->gestionaZonaEntradaDatos($texto);
        return $this->controlEntrada($this->contenido);
    }

    /**
     *
     * @param string $matricula      
     * @return boolean      
     */
    protected abstract function controlEntrada($matricula);

    /**
     *
     * @return string
     */
    protected abstract function getRestriccion();
}

?>
