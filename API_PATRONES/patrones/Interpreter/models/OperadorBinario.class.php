<?php
namespace Interpreter;

require_once 'Expression.class.php';

abstract class OperadorBinario extends Expression
{
    /** 
     * @var Expression 
     */
    protected $operandoIzquierdo;
    /**
     * @var Expression
     */
    protected $operandoDerecho;

    /**
     * 
     * @param Expression $operandoIzquierdo
     * @param Expression $operandoDerecho
     */
    public function __construct(Expression $operandoIzquierdo,
             Expression $operandoDerecho)
    {
        $this->operandoIzquierdo = $operandoIzquierdo;
        $this->operandoDerecho = $operandoDerecho;
    }
}


?>
