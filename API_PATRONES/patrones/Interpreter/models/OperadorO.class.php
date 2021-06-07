<?php
namespace Interpreter;

require_once 'OperadorBinario.class.php';
require_once 'OperadorY.class.php';
require_once 'Expression.class.php';

class OperadorO extends OperadorBinario
{
    /**
     * 
     * @param Expression $operandoIzquierdo
     * @param Expression $operandoDerecho
     */
    public function __construct($operandoIzquierdo, $operandoDerecho)
    {
        parent::__construct($operandoIzquierdo, $operandoDerecho);
    }

    public function evalua($descripcion)
    {
        return $this->operandoIzquierdo->evalua($descripcion) ||
        $this->operandoDerecho->evalua($descripcion);
    }

    /**
     * 
     * @return Expression
     * @throws \Exception
     */
    public static function parse()
    {
        $resultadoIzquierdo = OperadorY::parse();
        while ((isset(OperadorO::$item))
                && (OperadorO::$item === 'o'))
        {
            OperadorO::siguienteItem();
            $resultadoDerecho = OperadorY::parse();
            $resultadoIzquierdo = new OperadorO($resultadoIzquierdo,
            $resultadoDerecho);
        }
        return $resultadoIzquierdo;
    }
}


?>
