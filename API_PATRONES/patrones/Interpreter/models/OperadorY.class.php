<?php
namespace Interpreter;

require_once 'OperadorBinario.class.php';
require_once 'Expression.class.php';

class OperadorY extends OperadorBinario
{

    /**
     * 
     * @param Expression $operandoIzquierdo
     * @param Expression $operandoDerecho
     */
    public function __construct(Expression $operandoIzquierdo, 
            Expression $operandoDerecho)
    {
        parent::__construct($operandoIzquierdo, $operandoDerecho);
    }

    public function evalua($descripcion)
    {
        return $this->operandoIzquierdo->evalua($descripcion) &&
                 $this->operandoDerecho->evalua($descripcion);
    }
    
    /**
     *
     * @return Expression
     * @throws \Exception
     */
    public static function parse()
    {
        $resultadoIzquierdo = Expression::parse();
        while (isset(OperadorY::$item) &&
                 (OperadorY::$item === 'y'))
        {
            OperadorY::siguienteItem();
            $resultadoDerecho = Expression::parse();
            $resultadoIzquierdo = new OperadorY($resultadoIzquierdo, 
                    $resultadoDerecho);
        }
        return $resultadoIzquierdo;
    }
}

?>
