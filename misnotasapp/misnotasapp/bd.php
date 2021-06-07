<?php
error_reporting(E_ALL);
date_default_timezone_set("Chile/Continental");
class bd {

    protected $mysqli;
    const LOCALHOST = 'abascur.cl';
    const USER = 'abascur_root';
    const PASSWORD = 'android';
    const DATABASE = 'abascur_android';
    const PORT = 3306;

    public function __construct() {
        try{
            //conexión a base de datos
            $this->mysqli = new mysqli(self::LOCALHOST, self::USER, self::PASSWORD, self::DATABASE,self::PORT);
            $this->mysqli->set_charset("utf8");
        }catch (mysqli_sql_exception $e){
            //Si no se puede realizar la conexión
            http_response_code(500);
            exit;
        }
    }


 

    public function InsertOrUpdateUsuario($rutUsuario,$nombreUsuario,$contrasenaUsuario,$fechaHoraCreacion,$idAcceso) {
            $respuesta =Array();

            date_default_timezone_set("America/Santiago");
            $fecha = date("Y-m-d G:i:s");
            $fechaVacia = "0000-00-00 00:00:00";

            $query="INSERT INTO usuarios(rutUsuario,nombreUsuario,contrasenaUsuario,fechaHoraCreacion,fechaHoraInsert,fechaHoraUpdate,idAcceso) VALUES (?,?,?,?,?,?,?) ON DUPLICATE KEY UPDATE nombreUsuario = VALUES(nombreUsuario), contrasenaUsuario = VALUES(contrasenaUsuario),fechaHoraUpdate=VALUES(fechaHoraInsert)";


          if( $stmt = $this->mysqli->prepare($query)){
            

            $stmt->bind_param('ssssssi',$rutUsuario,$nombreUsuario,$contrasenaUsuario,$fechaHoraCreacion,$fecha,$fechaVacia,$idAcceso);
            $r = $stmt->execute();

            $respuesta= array('Estado' =>"success" ,
                              'Response'=>$r );
                              $stmt->close();
          }else{
            $Error = "Error: ".$this->mysqli->error." query : ".$query;
            $respuesta= array('Estado' =>"Error" ,
                              'Response'=>$Error );
          }


            return $respuesta;
    }


    public function InsertOrUpdateNota($rutUsuario,$idNota,$nombreNota,$descripcionNota,$fechaHoraCreacion,$idAcceso) {
      $respuesta =Array();

      date_default_timezone_set("America/Santiago");
      $fecha = date("Y-m-d G:i:s");
      $fechaVacia = "0000-00-00 00:00:00";

      $query="INSERT INTO notas(idNota,nombreNota,descripcionNota,fechaHoraCreacion,fechaHoraInsert,fechaHoraUpdate,idAcceso,rutUsuario) VALUES (?,?,?,?,?,?,?,?) ON DUPLICATE KEY UPDATE nombreNota = VALUES(nombreNota), descripcionNota = VALUES(descripcionNota),fechaHoraUpdate=VALUES(fechaHoraInsert)";


    if( $stmt = $this->mysqli->prepare($query)){
      

      $stmt->bind_param('isssssis',$idNota,$nombreNota,$descripcionNota,$fechaHoraCreacion,$fecha,$fechaVacia,$idAcceso,$rutUsuario);
      $r = $stmt->execute();

      $respuesta= array('Estado' =>"success" ,
                        'Response'=>$r );
                        $stmt->close();
    }else{
      $Error = "Error: ".$this->mysqli->error." query : ".$query;
      $respuesta= array('Estado' =>"Error" ,
                        'Response'=>$Error );
    }


      return $respuesta;
}

    


    public function DeleteUsuario($rutUsuario,$idAcceso) {

      $respuesta =Array();

      $query="DELETE FROM usuarios WHERE rutUsuario=? and idAcceso=?";


  if( $stmt = $this->mysqli->prepare($query)){

    $stmt->bind_param('si',$rutUsuario,$idAcceso);
    $r = $stmt->execute();

    $respuesta= array('Estado' =>"success" ,
                      'Response'=>$r );
                      $stmt->close();
  }else{
    $Error = "Error: ".$this->mysqli->error." query : ".$query;
    $respuesta= array('Estado' =>"Error" ,
                      'Response'=>$Error );
  }


    return $respuesta;
    }

    public function DeleteNota($rutUsuario,$idNota,$idAcceso) {

      $respuesta =Array();

      $query="DELETE FROM notas WHERE idNota=? and idAcceso=? and rutUsuario=?";


      if( $stmt = $this->mysqli->prepare($query)){

        $stmt->bind_param('iis',$idNota,$idAcceso,$rutUsuario);
        $r = $stmt->execute();

        $respuesta= array('Estado' =>"success" ,
                          'Response'=>$r );
                          $stmt->close();
      }else{
        $Error = "Error: ".$this->mysqli->error." query : ".$query;
        $respuesta= array('Estado' =>"Error" ,
                          'Response'=>$Error );
      }


    return $respuesta;
    }

    public function GetNota($rutUsuario,$idNota,$idAcceso) {

      $respuesta =Array();
      $datosNota =  Array();

      $query="SELECT idNota,nombreNota,descripcionNota,fechaHoraCreacion,fechaHoraUpdate,fechaHoraInsert,idAcceso,rutUsuario FROM notas WHERE idNota=? and idAcceso=? and rutUsuario=?";


      if( $stmt = $this->mysqli->prepare($query)){

        $stmt->bind_param('iis',$idNota,$idAcceso,$rutUsuario);
        $r = $stmt->execute();

        $stmt->bind_result($idNota
        ,$nombreNota
        ,$descripcionNota
        ,$fechaHoraCreacion
        ,$fechaHoraUpdate
        ,$fechaHoraInsert
        ,$idAcceso
        ,$rutUsuario
         );

                    $stmt->fetch();
                    $numero=$stmt->num_rows;
           
                    $datosNota = array("idNota"=>$idNota,
                    "nombreNota"=>$nombreNota,
                    "descripcionNota"=>$descripcionNota,
                    "fechaHoraCreacion"=>$fechaHoraCreacion,
                    "fechaHoraUpdate"=>$fechaHoraUpdate,
                    "fechaHoraInsert"=>$fechaHoraInsert,
                    "idAcceso"=>$idAcceso,
                    "rutUsuario"=>$rutUsuario
                    );

                    if($nombreNota!=null){
                      $respuesta= array('Estado' =>"success" ,
                   'Response'=>$datosNota );
                 }else{
                         $respuesta= array('Estado' =>"success" ,
                                         'Response'=> "NoData");
                 };
                          $stmt->close();
      }else{
        $Error = "Error: ".$this->mysqli->error." query : ".$query;
        $respuesta= array('Estado' =>"Error" ,
                          'Response'=>$Error );
      }


    return $respuesta;
    }

    public function GetUsuario($rutUsuario,$idAcceso) {

      $respuesta =Array();
      $datosUsuario =  Array();

      $query="SELECT rutUsuario,nombreUsuario,contrasenaUsuario,fechaHoraCreacion,fechaHoraUpdate,fechaHoraInsert,idAcceso  FROM usuarios WHERE rutUsuario=? and idAcceso=?";


      if( $stmt = $this->mysqli->prepare($query)){

        $stmt->bind_param('si',$rutUsuario,$idAcceso);
        $r = $stmt->execute();

        $stmt->bind_result($rutUsuario
        ,$nombreUsuario
        ,$contrasenaUsuario
        ,$fechaHoraCreacion
        ,$fechaHoraUpdate
        ,$fechaHoraInsert
        ,$idAcceso);

                    $stmt->fetch();
                    $numero=$stmt->num_rows;
                   
                    $datosUsuario = array("rutUsuario"=>$rutUsuario,
                    "nombreUsuario"=>$nombreUsuario,
                    "contrasenaUsuario"=>$contrasenaUsuario,
                    "fechaHoraCreacion"=>$fechaHoraCreacion,
                    "fechaHoraUpdate"=>$fechaHoraUpdate,
                    "fechaHoraInsert"=>$fechaHoraInsert,
                    "idAcceso"=>$idAcceso
                    );

                if($nombreUsuario!=null){
                      $respuesta= array('Estado' =>"success" ,
                   'Response'=>$datosUsuario );
                 }else{
                         $respuesta= array('Estado' =>"success" ,
                                         'Response'=> "NoData");
                 };
               
                          $stmt->close();
      }else{
        $Error = "Error: ".$this->mysqli->error." query : ".$query;
        $respuesta= array('Estado' =>"Error" ,
                          'Response'=>$Error );
      }


    return $respuesta;
    }

    public function GetAllUsuarios($idAcceso) {

      $usuario =  Array();
      $respuesta = Array();
            $query="SELECT rutUsuario,nombreUsuario,contrasenaUsuario,fechaHoraCreacion,fechaHoraUpdate,fechaHoraInsert,idAcceso FROM usuarios WHERE  idAcceso=?";

            if($stmt = $this->mysqli->prepare($query)){
              $stmt->bind_param('i',$idAcceso);
            $r = $stmt->execute();


                $stmt->bind_result($rutUsuario
                ,$nombreUsuario
                ,$contrasenaUsuario
                ,$fechaHoraCreacion
                ,$fechaHoraUpdate
                ,$fechaHoraInsert
                ,$idAcceso);
                
                    while ( $stmt->fetch()){
                    

                      $usuario[] = array("rutUsuario"=>$rutUsuario,
                                "nombreUsuario"=>$nombreUsuario,
                                "contrasenaUsuario"=>$contrasenaUsuario,
                                "fechaHoraCreacion"=>$fechaHoraCreacion,
                                "fechaHoraUpdate"=>$fechaHoraUpdate,
                                "fechaHoraInsert"=>$fechaHoraInsert,
                                "idAcceso"=>$idAcceso
                                );

                                }
                        

                if(count($usuario)>0){
                     $respuesta= array('Estado' =>"success" ,
                  'Response'=>$usuario );
                }else{
                        $respuesta= array('Estado' =>"success" ,
                                        'Response'=> "NoData");
                };
                $stmt->close();

          }else{
            $Error = "Error: ".$this->mysqli->error." query : ".$query;
            $respuesta= array('Estado' =>"Error" ,
                              'Response'=>$Error );
          }

            return $respuesta;
    }

    public function GetAllNotas($idAcceso) {

      $usuario =  Array();
      $respuesta = Array();
            $query="SELECT idNota,nombreNota,descripcionNota,fechaHoraCreacion,fechaHoraUpdate,fechaHoraInsert,idAcceso,rutUsuario FROM notas WHERE  idAcceso=?";

            if($stmt = $this->mysqli->prepare($query)){
              $stmt->bind_param('i',$idAcceso);
            $r = $stmt->execute();


                $stmt->bind_result($idNota
                ,$nombreNota
                ,$descripcionNota
                ,$fechaHoraCreacion
                ,$fechaHoraUpdate
                ,$fechaHoraInsert
                ,$idAcceso
                ,$rutUsuario);
                
                    while ( $stmt->fetch()){
                    

                      $usuario[] = array("idNota"=>$idNota,
                                "nombreNota"=>$nombreNota,
                                "descripcionNota"=>$descripcionNota,
                                "fechaHoraCreacion"=>$fechaHoraCreacion,
                                "fechaHoraUpdate"=>$fechaHoraUpdate,
                                "fechaHoraInsert"=>$fechaHoraInsert,
                                "idAcceso"=>$idAcceso,
                                "rutUsuario"=>$rutUsuario
                                );

                                }
                        

                if(count($usuario)>0){
                     $respuesta= array('Estado' =>"success" ,
                  'Response'=>$usuario );
                }else{
                        $respuesta= array('Estado' =>"success" ,
                                        'Response'=> "NoData");
                };
                $stmt->close();

          }else{
            $Error = "Error: ".$this->mysqli->error." query : ".$query;
            $respuesta= array('Estado' =>"Error" ,
                              'Response'=>$Error );
          }

            return $respuesta;
    }

    public function GetAllNotasUsuario($rutUsuario,$idAcceso) {

      $usuario =  Array();
      $respuesta = Array();
            $query="SELECT idNota,nombreNota,descripcionNota,fechaHoraCreacion,fechaHoraUpdate,fechaHoraInsert,idAcceso,rutUsuario FROM notas WHERE  idAcceso=? and rutUsuario=?";

            if($stmt = $this->mysqli->prepare($query)){
              $stmt->bind_param('is',$idAcceso,$rutUsuario);
            $r = $stmt->execute();


                $stmt->bind_result($idNota
                ,$nombreNota
                ,$descripcionNota
                ,$fechaHoraCreacion
                ,$fechaHoraUpdate
                ,$fechaHoraInsert
                ,$idAcceso
                ,$rutUsuario);
                
                    while ( $stmt->fetch()){
                    

                      $usuario[] = array("idNota"=>$idNota,
                                "nombreNota"=>$nombreNota,
                                "descripcionNota"=>$descripcionNota,
                                "fechaHoraCreacion"=>$fechaHoraCreacion,
                                "fechaHoraUpdate"=>$fechaHoraUpdate,
                                "fechaHoraInsert"=>$fechaHoraInsert,
                                "idAcceso"=>$idAcceso,
                                "rutUsuario"=>$rutUsuario
                                );

                                }
                        

                if(count($usuario)>0){
                     $respuesta= array('Estado' =>"success" ,
                  'Response'=>$usuario );
                }else{
                        $respuesta= array('Estado' =>"success" ,
                                        'Response'=> "NoData");
                };
                $stmt->close();

          }else{
            $Error = "Error: ".$this->mysqli->error." query : ".$query;
            $respuesta= array('Estado' =>"Error" ,
                              'Response'=>$Error );
          }

            return $respuesta;
    }


  }

  
?>
