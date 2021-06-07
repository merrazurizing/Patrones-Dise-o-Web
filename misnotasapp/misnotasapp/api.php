<?php
require_once 'bd.php';
require_once 'Utilidades.php';

class apiAlumnos {
    public function api(){
        header('Content-Type: application/JSON');
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
        case 'GET'://consulta
          $this->get();
        break;
        case 'POST'://actualiza
          $this->post();
        break;
        case 'PUT'://inserta
        echo 'PUT';
        break;
        case 'DELETE'://elimina
        echo 'DELETE';
        break;
        default:
        echo 'METODO NO SOPORTADO';
        break;
    }
}

//genera las respuestas
function response($code=200, $status="", $message="") {
    http_response_code($code);
    if( !empty($status) && !empty($message) ){
        $response = array("status" => $status ,"mensaje"=>$message);
        echo json_encode($response,JSON_PRETTY_PRINT);
    }
}




//funciones de la api
function post() {

    if($_GET['action']=='InsertOrUpdateUsuario'){
        $obj = json_decode( file_get_contents('php://input') );
        $objArr = (array)$obj;
        if (empty($objArr)){
            $this->response(200,"Error000","No se agrego JSON");
        }else{


            if(!isset($obj->rutUsuario)){
                $this->response(200,"Error001","No se agrego la etiqueta rutUsuario");
                exit;
            }
            if($obj->rutUsuario==''){
                $this->response(200,"Error002","La etiqueta rutUsuario esta vacia");
                exit;
            }
            if(valida_rut($obj->rutUsuario)==false){
                $this->response(200,"Error003","El rutUsuario Ingresado no es Valido");
                exit;
            }
            if(!isset($obj->nombreUsuario)){
                $this->response(200,"Error004","No se agrego la etiqueta nombreUsuario");
                exit;
            }
            if($obj->nombreUsuario==''){
                $this->response(200,"Error005","La etiqueta nombreUsuario esta vacia");
                exit;
            }
            if(strlen($obj->nombreUsuario)>100){
                $this->response(200,"Error006","nombreUsuario debe ser de largo menor a 100 caracteres ");
                exit;
            }
            

            if(!isset($obj->contrasenaUsuario)){
                $this->response(200,"Error007","No se agrego la etiqueta contrasenaUsuario");
                exit;
            }
            if($obj->contrasenaUsuario==''){
                $this->response(200,"Error008","La etiqueta contrasenaUsuario esta vacia");
                exit;
            }
            if(strlen($obj->contrasenaUsuario)>10){
                $this->response(200,"Error009","contrasenaUsuario debe ser de largo menor a 10 caracteres ");
                exit;
            }
            if(!isset($obj->fechaHoraCreacion)){
                $this->response(200,"Error010","No se agrego la etiqueta fechaHoraCreacion");
                exit;
            }
            if($obj->fechaHoraCreacion==''){
                $this->response(200,"Error011","La etiqueta fechaHoraCreacion esta vacia");
                exit;
            }
            if(!isset($obj->idAcceso)){
                $this->response(200,"Error012","No se agrego la etiqueta idAcceso");
                exit;
            }
            if($obj->idAcceso==''){
                $this->response(200,"Error013","La etiqueta idAcceso esta vacia");
                exit;
            }
            if (!ctype_digit($obj->idAcceso)) {
                $this->response(200,"Error014","La etiqueta idAcceso debe tomar valor numerico");
                exit;
            }
            

        $db = new bd();
        $respuesta=$db->InsertOrUpdateUsuario($obj->rutUsuario,$obj->nombreUsuario,$obj->contrasenaUsuario,$obj->fechaHoraCreacion,$obj->idAcceso);

        if($respuesta['Estado']=='success'){
            $this->response(200,"success","Se inserto De Forma Correcta");
        }else{
        $this->response(200,"Error999",$respuesta['Response']);
        exit;
        }
    } 


    exit;
    }

    if($_GET['action']=='InsertOrUpdateNota'){
        $obj = json_decode( file_get_contents('php://input') );
        $objArr = (array)$obj;
        if (empty($objArr)){
            $this->response(200,"Error000","No se agrego JSON");
        }else{

            if(!isset($obj->rutUsuario)){
                $this->response(200,"Error001","No se agrego la etiqueta rutUsuario");
                exit;
            }
            if($obj->rutUsuario==''){
                $this->response(200,"Error002","La etiqueta rutUsuario esta vacia");
                exit;
            }
            if(valida_rut($obj->rutUsuario)==false){
                $this->response(200,"Error003","El rutUsuario Ingresado no es Valido");
                exit;
            }

            if(!isset($obj->idNota)){
                $this->response(200,"Error015","No se agrego la etiqueta idNota");
                exit;
            }
            if($obj->idNota==''){
                $this->response(200,"Error016","La etiqueta idNota esta vacia");
                exit;
            }
            if (!ctype_digit($obj->idNota)) {
                $this->response(200,"Error017","La etiqueta idNota debe tomar valor numerico");
                exit;
            }
           
            if(!isset($obj->nombreNota)){
                $this->response(200,"Error018","No se agrego la etiqueta nombreNota");
                exit;
            }
            if($obj->nombreNota==''){
                $this->response(200,"Error019","La etiqueta nombreNota esta vacia");
                exit;
            }
            if(strlen($obj->nombreNota)>150){
                $this->response(200,"Error020","nombreNota debe ser de largo menor a 150 caracteres ");
                exit;
            }
            if(!isset($obj->descripcionNota)){
                $this->response(200,"Error021","No se agrego la etiqueta descripcionNota");
                exit;
            }
            if($obj->descripcionNota==''){
                $this->response(200,"Error022","La etiqueta descripcionNota esta vacia");
                exit;
            }
            if(strlen($obj->descripcionNota)>500){
                $this->response(200,"Error023","descripcionNota debe ser de largo menor a 500 caracteres ");
                exit;
            }
            if(!isset($obj->fechaHoraCreacion)){
                $this->response(200,"Error010","No se agrego la etiqueta fechaHoraCreacion");
                exit;
            }
            if($obj->fechaHoraCreacion==''){
                $this->response(200,"Error011","La etiqueta fechaHoraCreacion esta vacia");
                exit;
            }
            if(!isset($obj->idAcceso)){
                $this->response(200,"Error012","No se agrego la etiqueta idAcceso");
                exit;
            }
            if($obj->idAcceso==''){
                $this->response(200,"Error013","La etiqueta idAcceso esta vacia");
                exit;
            }
            if (!ctype_digit($obj->idAcceso)) {
                $this->response(200,"Error014","La etiqueta idAcceso debe tomar valor numerico");
                exit;
            }
            
            

        $db = new bd();
        $respuesta=$db->InsertOrUpdateNota($obj->rutUsuario,$obj->idNota,$obj->nombreNota,$obj->descripcionNota,$obj->fechaHoraCreacion,$obj->idAcceso);

        if($respuesta['Estado']=='success'){
            $this->response(200,"success","Se inserto De Forma Correcta");
        }else{
        $this->response(200,"Error999",$respuesta['Response']);
        exit;
        }
    } 


    exit;
    }




    if($_GET['action']=='DeleteUsuario'){
        $obj = json_decode( file_get_contents('php://input') );
        $objArr = (array)$obj;
        if (empty($objArr)){
            $this->response(200,"Error000","No se agrego JSON");
        }else{


            if(!isset($obj->rutUsuario)){
                $this->response(200,"Error001","No se agrego la etiqueta rutUsuario");
                exit;
            }
            if($obj->rutUsuario==''){
                $this->response(200,"Error002","La etiqueta rutUsuario esta vacia");
                exit;
            }
            if(valida_rut($obj->rutUsuario)==false){
                $this->response(200,"Error003","El rutUsuario Ingresado no es Valido");
                exit;
            }

            if(!isset($obj->idAcceso)){
                $this->response(200,"Error012","No se agrego la etiqueta idAcceso");
                exit;
            }
            if($obj->idAcceso==''){
                $this->response(200,"Error013","La etiqueta idAcceso esta vacia");
                exit;
            }
            if (!ctype_digit($obj->idAcceso)) {
                $this->response(200,"Error014","La etiqueta idAcceso debe tomar valor numerico");
                exit;
            }
            


        $db = new bd();
        $respuesta = $db->DeleteUsuario($obj->rutUsuario,$obj->idAcceso);
        if($respuesta['Estado']=='success'){
            $this->response(200,"success",$respuesta['Response']);
        }else{
          $this->response(200,"Error00",$respuesta['Response']);
          exit;
        }

    } //elseemtyarreglo
exit;
}//CIERRA ACTION


if($_GET['action']=='DeleteNota'){
    $obj = json_decode( file_get_contents('php://input') );
    $objArr = (array)$obj;
    if (empty($objArr)){
        $this->response(200,"Error000","No se agrego JSON");
    }else{

        if(!isset($obj->rutUsuario)){
            $this->response(200,"Error001","No se agrego la etiqueta rutUsuario");
            exit;
        }
        if($obj->rutUsuario==''){
            $this->response(200,"Error002","La etiqueta rutUsuario esta vacia");
            exit;
        }
        if(valida_rut($obj->rutUsuario)==false){
            $this->response(200,"Error003","El rutUsuario Ingresado no es Valido");
            exit;
        }

        if(!isset($obj->idNota)){
            $this->response(200,"Error015","No se agrego la etiqueta idNota");
            exit;
        }
        if($obj->idNota==''){
            $this->response(200,"Error016","La etiqueta idNota esta vacia");
            exit;
        }
        if (!ctype_digit($obj->idNota)) {
            $this->response(200,"Error017","La etiqueta idNota debe tomar valor numerico");
            exit;
        }
        
        if(!isset($obj->idAcceso)){
            $this->response(200,"Error012","No se agrego la etiqueta idAcceso");
            exit;
        }
        if($obj->idAcceso==''){
            $this->response(200,"Error013","La etiqueta idAcceso esta vacia");
            exit;
        }
        if (!ctype_digit($obj->idAcceso)) {
            $this->response(200,"Error014","La etiqueta idAcceso debe tomar valor numerico");
            exit;
        }
        


    $db = new bd();
    $respuesta = $db->DeleteNota($obj->rutUsuario,$obj->idNota,$obj->idAcceso);
    if($respuesta['Estado']=='success'){
        $this->response(200,"success",$respuesta['Response']);
    }else{
      $this->response(200,"Error00",$respuesta['Response']);
      exit;
    }

} //elseemtyarreglo
exit;
}//CIERRA ACTION

if($_GET['action']=='GetUsuario'){
    $obj = json_decode( file_get_contents('php://input') );
    $objArr = (array)$obj;
    if (empty($objArr)){
        $this->response(200,"Error000","No se agrego JSON");
    }else{


        if(!isset($obj->rutUsuario)){
            $this->response(200,"Error001","No se agrego la etiqueta rutUsuario");
            exit;
        }
        if($obj->rutUsuario==''){
            $this->response(200,"Error002","La etiqueta rutUsuario esta vacia");
            exit;
        }
        if(valida_rut($obj->rutUsuario)==false){
            $this->response(200,"Error003","El rutUsuario Ingresado no es Valido");
            exit;
        }

        if(!isset($obj->idAcceso)){
            $this->response(200,"Error012","No se agrego la etiqueta idAcceso");
            exit;
        }
        if($obj->idAcceso==''){
            $this->response(200,"Error013","La etiqueta idAcceso esta vacia");
            exit;
        }
        if (!ctype_digit($obj->idAcceso)) {
            $this->response(200,"Error014","La etiqueta idAcceso debe tomar valor numerico");
            exit;
        }
        


    $db = new bd();
    $respuesta = $db->GetUsuario($obj->rutUsuario,$obj->idAcceso);
    if($respuesta['Estado']=='success'){
        $this->response(200,"success",$respuesta['Response']);
    }else{
      $this->response(200,"Error00",$respuesta['Response']);
      exit;
    }

} //elseemtyarreglo
exit;
}//CIERRA ACTION

if($_GET['action']=='GetNota'){
    $obj = json_decode( file_get_contents('php://input') );
    $objArr = (array)$obj;
    if (empty($objArr)){
        $this->response(200,"Error000","No se agrego JSON");
    }else{


        if(!isset($obj->rutUsuario)){
            $this->response(200,"Error001","No se agrego la etiqueta rutUsuario");
            exit;
        }
        if($obj->rutUsuario==''){
            $this->response(200,"Error002","La etiqueta rutUsuario esta vacia");
            exit;
        }
        if(valida_rut($obj->rutUsuario)==false){
            $this->response(200,"Error003","El rutUsuario Ingresado no es Valido");
            exit;
        }
        if(!isset($obj->idNota)){
            $this->response(200,"Error015","No se agrego la etiqueta idNota");
            exit;
        }
        if($obj->idNota==''){
            $this->response(200,"Error016","La etiqueta idNota esta vacia");
            exit;
        }
        if (!ctype_digit($obj->idNota)) {
            $this->response(200,"Error017","La etiqueta idNota debe tomar valor numerico");
            exit;
        }
        
        if(!isset($obj->idAcceso)){
            $this->response(200,"Error012","No se agrego la etiqueta idAcceso");
            exit;
        }
        if($obj->idAcceso==''){
            $this->response(200,"Error013","La etiqueta idAcceso esta vacia");
            exit;
        }
        if (!ctype_digit($obj->idAcceso)) {
            $this->response(200,"Error014","La etiqueta idAcceso debe tomar valor numerico");
            exit;
        }
        


    $db = new bd();
    $respuesta = $db->GetNota($obj->rutUsuario,$obj->idNota,$obj->idAcceso);
    if($respuesta['Estado']=='success'){
        $this->response(200,"success",$respuesta['Response']);
    }else{
      $this->response(200,"Error00",$respuesta['Response']);
      exit;
    }

} //elseemtyarreglo
exit;
}//CIERRA ACTION


if($_GET['action']=='GetAllNotasUsuario'){
    $obj = json_decode( file_get_contents('php://input') );
    $objArr = (array)$obj;
    if (empty($objArr)){
        $this->response(200,"Error000","No se agrego JSON");
    }else{


        if(!isset($obj->rutUsuario)){
            $this->response(200,"Error001","No se agrego la etiqueta rutUsuario");
            exit;
        }
        if($obj->rutUsuario==''){
            $this->response(200,"Error002","La etiqueta rutUsuario esta vacia");
            exit;
        }
        if(valida_rut($obj->rutUsuario)==false){
            $this->response(200,"Error003","El rutUsuario Ingresado no es Valido");
            exit;
        }
       
        
        if(!isset($obj->idAcceso)){
            $this->response(200,"Error012","No se agrego la etiqueta idAcceso");
            exit;
        }
        if($obj->idAcceso==''){
            $this->response(200,"Error013","La etiqueta idAcceso esta vacia");
            exit;
        }
        if (!ctype_digit($obj->idAcceso)) {
            $this->response(200,"Error014","La etiqueta idAcceso debe tomar valor numerico");
            exit;
        }
        


    $db = new bd();
    $respuesta = $db->GetAllNotasUsuario($obj->rutUsuario,$obj->idAcceso);
    if($respuesta['Estado']=='success'){
        $this->response(200,"success",$respuesta['Response']);
    }else{
      $this->response(200,"Error00",$respuesta['Response']);
      exit;
    }

} //elseemtyarreglo
exit;
}//CIERRA ACTION

$this->response(400);
}//CIERRA post



function get(){
    

       if($_GET['action']=='GetAllUsuarios'){

        
            if($_GET['id']==''){
                $this->response(200,"Error024","La etiqueta id esta vacia");
                exit;
            }
            if (!ctype_digit($_GET['id'])) {
                $this->response(200,"Error025","La etiqueta id debe tomar valor numerico");
                exit;
            }
            
            $db = new bd();
            $respuesta = $db->GetAllUsuarios($_GET['id']);

           if($respuesta['Estado']=='success'){
               $this->response(200,"success",$respuesta['Response']);
           }else{
             $this->response(200,"Error999",$respuesta['Response']);
             exit;
           }
     }else{
            $this->response(400);
     }

     if($_GET['action']=='GetAllNotas'){

        
        if($_GET['id']==''){
            $this->response(200,"Error024","La etiqueta id esta vacia");
            exit;
        }
        if (!ctype_digit($_GET['id'])) {
            $this->response(200,"Error025","La etiqueta id debe tomar valor numerico");
            exit;
        }
        
        $db = new bd();
        $respuesta = $db->GetAllNotas($_GET['id']);

       if($respuesta['Estado']=='success'){
           $this->response(200,"success",$respuesta['Response']);
       }else{
         $this->response(200,"Error999",$respuesta['Response']);
         exit;
       }
 }else{
        $this->response(400);
 }
     
}

}//CIERRA bd
?>
