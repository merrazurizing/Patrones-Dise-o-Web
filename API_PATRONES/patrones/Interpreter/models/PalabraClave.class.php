<?php
namespace Interpreter;

require_once 'Expression.class.php';

class PalabraClave extends Expression
{
    /**
     * 
     * @var string
     */
    protected $palabraClave;

    /**
     *
     * @param string $palabraClave            
     */
    public function __construct($palabraClave)
    {
        $this->palabraClave = $palabraClave;
    }

    public function evalua($descripcion)
    {
        return strpos($descripcion, $this->palabraClave) !== FALSE;
    }
    
    /**
     *
     * @return Expression
     */
    public static function parse()
    {
        $resultado = new PalabraClave(PalabraClave::$item);
        PalabraClave::siguienteItem();
        return $resultado;
    }
}

?>
