<?php
header('Content-Type: text/html; charset=utf-8');

require_once './patrones/AbstractFactory/EjemploAbstractFactory.php';
require_once './patrones/Builder/EjemploBuilder.php';
require_once './patrones/FactoryMethod/EjemploFactoryMethod.php';
require_once './patrones/Prototype/EjemploPrototype.php';
require_once './patrones/Singleton/EjemploSingleton.php';
require_once './patrones/Adapter/EjemploAdapter.php';
require_once './patrones/Bridge/EjemploBridge.php';
require_once './patrones/Composite/EjemploComposite.php';
require_once './patrones/Decorator/EjemploDecorator.php';

require_once './patrones/Facade/EjemploFacade.php';
require_once './patrones/Flyweight/EjemploFlyweight.php';
require_once './patrones/Proxy/EjemploProxy.php';


require_once './patrones/ChainOfResponsibility/EjemploChainOfResponsibility.php';
require_once './patrones/Command/EjemploCommand.php';
require_once './patrones/Interpreter/EjemploInterpreter.php';
require_once './patrones/Iterator/EjemploIterator.php';
require_once './patrones/Mediator/EjemploMediator.php';
require_once './patrones/Memento/EjemploMemento.php';
require_once './patrones/Observer/EjemploObserver.php';
require_once './patrones/State/EjemploState.php';
require_once './patrones/Strategy/EjemploStrategy.php';
require_once './patrones/TemplateMethod/EjemploTemplateMethod.php';
require_once './patrones/Visitor/EjemploVisitor.php';

use Proxy\EjemploProxy;
use State\EjemploState;
use Bridge\EjemploBridge;
use Facade\EjemploFacade;
use Adapter\EjemploAdapter;
use Builder\EjemploBuilder;
use Command\EjemploCommand;
use Memento\EjemploMemento;
use Visitor\EjemploVisitor;
use Iterator\EjemploIterator;
use Mediator\EjemploMediator;
use Observer\EjemploObserver;
use Strategy\EjemploStrategy;
use Composite\EjemploComposite;
use Decorator\EjemploDecorator;
use Flyweight\EjemploFlyweight;
use Prototype\EjemploPrototype;
use Singleton\EjemploSingleton;
use Interpreter\EjemploInterpreter;
use FactoryMethod\EjemploFactoryMethod;
use TemplateMethod\EjemploTemplateMethod;
use AbstractFactory\EjemploAbstractFactory;
use ChainOfResponsibility\EjemploChainOfResponsibility;

class apiPatrones
{
    public function api()
    {
        header('Content-Type: application/JSON');
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
            case 'GET': //consulta
                echo 'METODO NO SOPORTADO';
                break;
                break;
            case 'POST': //actualiza
                $this->EjemplosPatrones();
                break;
            case 'PUT': //inserta
                echo 'METODO NO SOPORTADO';
                break;
            case 'DELETE': //elimina
                echo 'METODO NO SOPORTADO';
                break;
            default:
                echo 'METODO NO SOPORTADO';
                break;
        }
    }

//genera las respuestas
    public function response($code = 200, $status = "", $message = "")
    {
        http_response_code($code);
        if (!empty($status) && !empty($message)) {
            $response = array("status" => $status, "mensaje" => $message);
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
    }

    public function EjemplosPatrones()
    {

        if ($_GET['action'] == 'EjemploAbstractFactory') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploAbstractFactory($obj->opcion, $obj->num_autos, $obj->num_scooters);
                $respuesta = $ejemplo->generar();
                // var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }
        if ($_GET['action'] == 'EjemploBuilder') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploBuilder($obj->opcion, $obj->cliente);
                $respuesta = $ejemplo->generar();
                // var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }

        if ($_GET['action'] == 'EjemploFactoryMethod') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploFactoryMethod($obj->opcion, $obj->monto);
                $respuesta = $ejemplo->generar();
                // var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }

        if ($_GET['action'] == 'EjemploPrototype') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploPrototype($obj->cliente, $obj->opcion);
                $respuesta = $ejemplo->generar();
                // var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }

        if ($_GET['action'] == 'EjemploSingleton') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploSingleton($obj->nombre, $obj->direccion, $obj->email);
                $respuesta = $ejemplo->generar();
                // var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }

        if ($_GET['action'] == 'EjemploAdapter') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploAdapter($obj->opcion, $obj->texto);
                $respuesta = $ejemplo->generar();
                // var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }
        if ($_GET['action'] == 'EjemploBridge') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploBridge($obj->opcion, $obj->texto);
                $respuesta = $ejemplo->generar();
                // var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }

        if ($_GET['action'] == 'EjemploComposite') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (!empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploComposite();
                $respuesta = $ejemplo->generar();
                // var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }

        if ($_GET['action'] == 'EjemploDecorator') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (!empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploDecorator();
                $respuesta = $ejemplo->generar();
                // var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }

        if ($_GET['action'] == 'EjemploFacade') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (!empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploFacade();
                $respuesta = $ejemplo->generar();
                // var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }

        if ($_GET['action'] == 'EjemploFlyweight') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (!empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploFlyweight();
                $respuesta = $ejemplo->generar();
                // var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }

        if ($_GET['action'] == 'EjemploProxy') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (!empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploProxy();
                $respuesta = $ejemplo->generar();
                // var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }


        if ($_GET['action'] == 'EjemploChainOfResponsibility') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (!empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploChainOfResponsibility();
                $respuesta = $ejemplo->generar();
                // var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }

        if ($_GET['action'] == 'EjemploCommand') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (!empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploCommand();
                $respuesta = $ejemplo->generar();
                // var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }

        if ($_GET['action'] == 'EjemploInterpreter') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploInterpreter($obj->consulta, $obj->descripcion);
                $respuesta = $ejemplo->generar();
                // var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }

        if ($_GET['action'] == 'EjemploIterator') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (!empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploIterator();
                $respuesta = $ejemplo->generar();
                // var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }
        
        if ($_GET['action'] == 'EjemploMediator') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (!empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploMediator();
                $respuesta = $ejemplo->generar();
                //var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }
        if ($_GET['action'] == 'EjemploMemento') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (!empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploMemento();
                $respuesta = $ejemplo->generar();
                //var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }
        if ($_GET['action'] == 'EjemploObserver') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (!empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploObserver();
                $respuesta = $ejemplo->generar();
                //var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }

        if ($_GET['action'] == 'EjemploState') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (!empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploState();
                $respuesta = $ejemplo->generar();
                //var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }

        if ($_GET['action'] == 'EjemploStrategy') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (!empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploStrategy();
                $respuesta = $ejemplo->generar();
                //var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }

        if ($_GET['action'] == 'EjemploTemplateMethod') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (!empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploTemplateMethod();
                $respuesta = $ejemplo->generar();
                //var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }
        if ($_GET['action'] == 'EjemploVisitor') {
            $obj = json_decode(file_get_contents('php://input'));
            $objArr = (array) $obj;
            if (!empty($objArr)) {
                $this->response(200, "Error000", "No se agrego JSON");
            } else {

                $ejemplo = new EjemploVisitor();
                $respuesta = $ejemplo->generar();
                //var_dump($respuesta);
                if ($respuesta['Estado'] == 'success') {
                    $this->response(200, "success", $respuesta['Response']);
                } else {
                    $this->response(200, "Error999", $respuesta['Response']);
                    exit;
                }
            }

            exit;
        }

        $this->response(400);
    }

    

}
