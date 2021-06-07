<?php
namespace Adapter;



class ComponentePdf
{
    /**
     * 
     * @var string
     */
    protected $contenido;

    /**
     *
     * @param string $contenido            
     */
    public function pdfFijaContenido($contenido)
    {
        $this->contenido = $contenido;
    }

    public function pdfPreparaMuestra()
    {
     
        return array(
            'Muestra contenido documento' =>  "PDF",
            'Estado' =>  "Inicio",
            'contenido' =>  $this->contenido
        
        );
        
    }

    public function pdfRefresca()
    {
      
                return array(
                    'Muestra contenido documento' =>  "PDF",
                    'Estado' =>  "Muestra",
                    'contenido' =>  $this->contenido,
                
                );
    }

    public function pdfTerminaMuestra()
    {
      
        return array(
            'Muestra contenido documento' =>  "PDF",
            'contenido' =>  $this->contenido,
        
        );
    }

    public function pdfEnviaImpresora()
    {
    
        return array(
            'impresion contenido documento' =>  "PDF",
            'contenido' =>  $this->contenido,
        
        );
    }
}

?>
