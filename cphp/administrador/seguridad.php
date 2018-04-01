<?php
function seguridad($usuario){
$ver= false;
if (isset($_SESSION["estado"])){
      if(strcasecmp($_SESSION["TIPO_USUARIO"],$usuario)==0){
        $ver=true;
        }
  }
if(!$ver){
    header('Location: ../../acceso_denegado.php');
}else{
  include("../conexion/conexion.php");
}
}
 ?>
