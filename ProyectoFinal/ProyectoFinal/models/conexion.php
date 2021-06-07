<?php

$conexion= mysqli_connect("localhost","root","","proyecto_final");

if (mysqli_connect_errno()){
  echo "Error al connectar a MySQL: " . mysqli_connect_error();
}

?>
