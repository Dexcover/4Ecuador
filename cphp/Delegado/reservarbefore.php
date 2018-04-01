<?php include("mipedido.php");
session_start();
include("../conexion/conexion.php");
$centro=$_SESSION["ID_CENTRO"];
  $cont=$_SESSION['cont'];
  $ver=false;
  if($cont>0 || !isset($_SESSION['cont']) ) {
    if(isset($_SESSION['miPedido'])){
  $result = mysqli_query(enviaconex(),"SELECT MAX(ID_PEDIDO) AS MAXIMO FROM PEDIDO");
  $row = mysqli_fetch_array($result);
  $valor=$row["MAXIMO"]+1;

  $men=utf8_decode("Pedido Enviado correctamente, se le informará el progreso del Pedido");
        $sql = "INSERT INTO PEDIDO (ID_PEDIDO,ID_CENTRO,FECHA,ESTADO, PRIORIDAD, DESCRIPCION,LATITUD, LONGITUD,TIPO_PEDIDO) VALUES ($valor, '$centro',sysdate(), 'PENDIENTE', 'NORMAL','$men',NULL, NULL, 'ORDINARIA');";
        mysqli_query(enviaconex(), $sql)or die(mysql_error());

  $miVector=$_SESSION['miPedido'];
  $cont=$_SESSION['cont'];
for($i=0;$i<$cont;$i++){
        $buscarClase = $miVector[$i];
        $cod=$buscarClase->getCodProducto();
        $cantidad=$buscarClase->getCantidad();
        $sql2 = "INSERT INTO PRODUCTO_PEDIDO VALUES ('$cod', $valor,$cantidad,0)";
        mysqli_query(enviaconex(), $sql2)or die(mysql_error());
}

unset($_SESSION['miPedido']);
  $_SESSION['cont']=0;
  echo "Pedido enviado";
  $ver=true;
}
}

if(!$ver){
echo "No hay Productos para Enviar";
}


 //header("Location: ../user.php");
 ?>
