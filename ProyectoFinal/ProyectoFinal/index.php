<?php
namespace ProyectoFinal;


require_once 'models\conexion.php';
require_once 'models\CocinaNormal.php';
require_once 'models\CocinaVegano.php';
require_once 'models\HeladoNormal.php';
require_once 'models\HeladoVegano.php';
require_once 'models\PlatoFondo.php';
require_once 'models\Asado.php';
require_once 'models\Lenteja.php';
require_once 'models\Postre.php';
require_once 'models\Cliente.php';
require_once 'models\Cocina.php';
require_once 'models\Comida.php';
require_once 'models\Inventario.php';
require_once 'models\Solicitud.php';
require_once 'models\TipoSolicitud.php';
require_once 'models\EstadoSolicitud.php';
require_once 'models\IniciarSolicitud.php';
require_once 'models\PedidoEnEspera.php';
require_once 'models\PedidoEntregado.php';
require_once 'models\Consumiendo.php';
require_once 'models\PorPagar.php';
require_once 'models\Pagado.php';


use models\TipoSolicitud;
use models\Cliente;
use models\CocinaNormal;
use models\CocinaVegano;
use models\Comida;
use models\Inventario;
use models\Solicitud;


//Agregar elemento a inventario
Inventario::ingresarIngrediente("ARANDANOS",90);

echo json_encode(array(
    'Lista Ingredientes: '=> Inventario::listarIngrediente(),
),JSON_PRETTY_PRINT);

echo "<br>";
echo "<br>";

//Eliminar ingrediente de inventario
Inventario::eliminarIngrediente("ARANDANOS");

echo json_encode(array(
    'Lista Ingredientes: '=> Inventario::listarIngrediente(),
),JSON_PRETTY_PRINT);

echo "<br>";
echo "<br>";

//Mostrar las preparaciones en base a los ingredientes disponibles 
//en este nivel se muestran las 4 preparaciones disponibles

Comida::getMenu();


//Se crea un nuevo cliente
$cliente = new Cliente("Juancho","12315");


echo "<br>";
echo "<br>";
echo $cliente->nombre;
echo "<br>";
echo $cliente->telefono;
echo "<br>";
echo "<br>";


//Creación de comidas normales
$comida1 = new CocinaNormal();
$alimento1 = $comida1->crearPlatoFondo(2);


//se listan las preparaciones normales
echo json_encode(array(
    'Lista Ingredientes Normales: '=> $comida1->listarAlimentos(),
),JSON_PRETTY_PRINT);

//Creación de comidas veganas
$comida2 = new CocinaVegano();
$alimento2 = $comida2->crearPlatoFondo(2);


//se listan las preparaciones normales
echo "<br>";
echo "<br>";
echo json_encode(array(
    'Lista Ingredientes Veganos: '=> $comida2->listarAlimentos(),
),JSON_PRETTY_PRINT);

echo "<br>";
echo "<br>";

//se listan los ingredientes para desmostrar que fueron descontados en base a las preparaciones
echo json_encode(array(
    'Lista Ingredientes: '=> Inventario::listarIngrediente(),
),JSON_PRETTY_PRINT);

echo "<br>";
echo "<br>";

//Se muestran el menu en base  a los descuentos, faltan ambos platos de fondo 
Comida::getMenu();

echo "<br>";
echo "<br>";



$ListaAlimentos[] = $alimento1;
$ListaAlimentos[] = $alimento2;

//se crean solicitudes para un cliente
//estado 1 = LLEVAR

$solicitud=new Solicitud($cliente,TipoSolicitud::estado1,$ListaAlimentos);
echo "<br>";
echo "<br>";
echo $solicitud->mostrarSolicitud();
echo "<br>";

//se generan varios  estadosSiguientes()
//para pasar por todos los estados hasta el final
$solicitud->estadoSiguiente();

echo "<br>";
echo "<br>";
echo $solicitud->mostrarSolicitud();

echo "<br>";
echo "<br>";
$solicitud->estadoSiguiente();

echo "<br>";
echo "<br>";
echo $solicitud->mostrarSolicitud();

echo "<br>";
echo "<br>";
$solicitud->estadoSiguiente();

echo "<br>";
echo "<br>";
echo $solicitud->mostrarSolicitud();

echo "<br>";
echo "<br>";
$solicitud->estadoSiguiente();

echo "<br>";
echo "<br>";
echo $solicitud->mostrarSolicitud();

echo "<br>";
echo "<br>";


//se muestra eln historial de modificaciones para verificar que se ha guardado este y otras solicitudes
echo json_encode(array(
    'Historial Pedidos: '=> Solicitud::getHistorialSolicitud(),
),JSON_PRETTY_PRINT);

//Se agregan los ingredientes que se quitaron, se hace sólo por comodidad al revisar el ejercicio

Inventario::modificarIngrediente("CARNE", 2);
Inventario::modificarIngrediente("SAL", 400);
Inventario::modificarIngrediente("LENTEJA", 400);
Inventario::modificarIngrediente("LONGANIZA VEGANA", 2);
