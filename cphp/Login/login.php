<?php
include("../conexion/conexion.php");
function validarUsuario(){
$usuario=$_POST['form-username'];
$clave=$_POST['form-password'];
$modulo=$_POST['opcion'];
$valUsuario=false;
$valClave=false;
$val=false;

 	$check = mysqli_query(enviaconex(), "SELECT * FROM USUARIO")or die(mysql_error());
 	while($info = mysqli_fetch_array( $check )){

      if(strcasecmp($info['CEDULA'],$usuario)==0){
          if(strcmp($info['CLAVE'],md5($clave))==0){
            if(strcasecmp($info['TIPO_USUARIO'],"DELEGADO")==0){
              $_SESSION["ID_CENTRO"] = $info['ID_CENTRO'];
              $_SESSION["estado"] = true;
              $_SESSION["USUARIO"] = $usuario;
              $_SESSION["TIPO_USUARIO"]="DELEGADO";
              return "../../cphp/Delegado/tipo.php";
          }elseif (strcasecmp($info['TIPO_USUARIO'],"AYUDANTE")==0) {
            $_SESSION["ID_CENTRO"] = $info['ID_CENTRO'];
            $_SESSION["estado"] = true;
            $_SESSION["USUARIO"] = $usuario;
            $_SESSION["TIPO_USUARIO"]="AYUDANTE";
            return "../../cphp/Ayudante/inventario.php";
          }elseif (strcasecmp($info['TIPO_USUARIO'],"ADMINISTRADOR")==0 ) {
            $_SESSION["ID_CENTRO"] = $info['ID_CENTRO'];
            $_SESSION["estado"] = true;
            $_SESSION["USUARIO"] = $usuario;
            $_SESSION["TIPO_USUARIO"]="ADMINISTRADOR";
            return "Administrador";
          }
}
}
}
return "false";
}



 ?>
