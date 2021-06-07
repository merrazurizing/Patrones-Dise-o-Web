<?php
namespace Adapter;

require_once 'Documento.class.php';


class DocumentoHtml implements Documento
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
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;
    }

    public function dibuja()
    {
      
                return array(
                    'Dibuja documento' =>  "HTML",
                    'contenido' =>  $this->contenido,
                
                );
    }

    public function imprime()
    {

                return array(
                    'Imprime documento' =>  "HTML",
                    'contenido' =>  $this->contenido,
                );
    }
}

?>
