<?php
function seguridad($usuario){
  $ver= false;
  if (isset($_SESSION["estado"])){
        if(strcasecmp($_SESSION["TIPO_USUARIO"],$usuario)==0){
          $ver=true;
          }
    }
  return $ver;
}


function seguridadAdministrador(){
$ver=seguridad("Administrador");
if(!$ver){
    header('Location: ../Seguridad/acceso_denegado.php');
}else{
  include("../conexion/conexion.php");
}
}



function seguridadDelegado($var){
$ver=seguridad("DELEGADO");
if(!$ver){
    header('Location: ../Seguridad/acceso_denegado.php');
}else{
  if($var)
  include("../conexion/conexion.php");
}
}

function seguridadAyudante(){
  $ver=seguridad("AYUDANTE");
  if(!$ver){
      header('Location: ../Seguridad/acceso_denegado.php');
  }else{
    if($var)
    include("../conexion/conexion.php");
  }
}



 ?>
