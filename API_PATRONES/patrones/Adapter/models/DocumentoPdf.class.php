<?php
namespace Adapter;

require_once 'Documento.class.php';
require_once 'ComponentePdf.class.php';

class DocumentoPdf implements Documento
{
    /**
     * 
     * @var ComponentePdf
     */
    protected $herramientaPdf;

    public function __construct()
    {
        $this->herramientaPdf = new ComponentePdf();
    }

    /**
     *
     * @param string $contenido            
     */
    public function setContenido($contenido)
    {
        $this->herramientaPdf->pdfFijaContenido($contenido);
    }

    public function dibuja()
    {
        $this->herramientaPdf->pdfPreparaMuestra();
        $this->herramientaPdf->pdfRefresca();
        $this->herramientaPdf->pdfTerminaMuestra();
        return  $this->herramientaPdf->pdfTerminaMuestra();
    }

    public function imprime()
    {
        $this->herramientaPdf->pdfEnviaImpresora();
        return $this->herramientaPdf->pdfEnviaImpresora();
    }
}

?>
