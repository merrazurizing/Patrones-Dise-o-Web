<?php
namespace Interpreter;

require_once 'OperadorO.class.php';
require_once 'PalabraClave.class.php';

abstract class Expression
{

    /**
     * 
     * @var string
     */
    protected static $origen;
    /**
     * 
     * @var int
     */
    protected static $indice;
    /**
     * 
     * @var string
     */
    protected static $item;

    /**
     *
     * @param string $descripcion            
     * @return boolean
     */
    public abstract function evalua($descripcion);
    
    /**
     *
     * @return void
     */
    protected static function siguienteItem()
    {
        while ((Expression::$indice < 
                 strlen(Expression::$origen)) &&
                 (Expression::$origen[Expression::$indice] ==
                  ' '))
        {
            Expression::$indice ++;
        }
        if (Expression::$indice == strlen(Expression::$origen))
        {
            Expression::$item = null;
        }
        elseif ((Expression::$origen[Expression::$indice]
                  == '(') ||
                 (Expression::$origen[Expression::$indice]
                   == ')'))
        {
            Expression::$item = substr(Expression::$origen, 
                    Expression::$indice, 1);
            Expression::$indice ++;
        }
        else
        {
            $inicio = Expression::$indice;
            while ((Expression::$indice <
                     strlen(Expression::$origen)) &&
                     (Expression::$origen[Expression::$indice] !=
                     ' ') &&
                     (Expression::$origen[Expression::$indice] !=
                     ')'))
            {
                Expression::$indice ++;
            }
            Expression::$item = substr(Expression::$origen, 
                    $inicio, Expression::$indice - $inicio);
        }
    }

    /**
     *
     * @param string $origen            
     * @return Expression
     * @throws \Exception
     */
    public static function analisis($origen)
    {
        Expression::$origen = $origen;
        Expression::$indice = 0;
        Expression::siguienteItem();
        return OperadorO::parse();
    }

    /**
     *
     * @return Expression
     * @throws \Exception
     */
    public static function parse()
    {
        $resultado = null;
        if (Expression::$item === '(')
        {
            Expression::siguienteItem();
            $resultado = OperadorO::parse();
            if (!isset(Expression::$item))
            {
                throw new \Exception("Error de sintaxis");
            }
            if (Expression::$item !== ')')
            {
                throw new \Exception("Error de sintaxis");
            }
            Expression::siguienteItem();
        }
        else
        {
            $resultado = PalabraClave::parse();
        }
        return $resultado;
    }
}

?>
