<?php include("../conexion/conexion.php");
$idPedido=$_POST['idPedido'];
$sql="SELECT PRODUCTO.COD_PRODUCTO,NOMBRE_PRODUCTO, CANTIDAD_PEDIDO, CANTIDAD_ENVIADA FROM PEDIDO, PRODUCTO_PEDIDO, PRODUCTO WHERE PEDIDO.ID_PEDIDO='$idPedido' AND PEDIDO.ID_PEDIDO=PRODUCTO_PEDIDO.ID_PEDIDO AND PRODUCTO.COD_PRODUCTO=PRODUCTO_PEDIDO.COD_PRODUCTO";
$data=mysqli_query(enviaconex(),$sql)or die(mysql_error());
$cont=0;
$ob=$_POST['ob'];
$sql="UPDATE PEDIDO SET ESTADO='APROBADO', DESCRIPCION='$ob' WHERE ID_PEDIDO='$idPedido'";
mysqli_query(enviaconex(),$sql)or die(mysql_error());
while ($info = mysqli_fetch_array($data)) {
  $varc="cod_producto$cont";
  $var="cantidad_pedida$cont";
  $var2="cantidad_enviada$cont";
  $cantidad_pedida=$_POST[$var];
  $cantidad_enviada=$_POST[$var2];
  $cod_producto=$_POST[$varc];

  $sql="UPDATE PRODUCTO_PEDIDO SET CANTIDAD_PEDIDO='$cantidad_pedida' ,CANTIDAD_ENVIADA='$cantidad_enviada'  WHERE COD_PRODUCTO='$cod_producto' AND ID_PEDIDO='$idPedido'";
  mysqli_query(enviaconex(),$sql)or die(mysql_error());

  $sql2 = "select * from PRODUCTO_CENTRO ";
  $check1 = mysqli_query(enviaconex(),$sql2)or die(mysql_error());

    while($info1 = mysqli_fetch_array( $check1 )){

          if(strcasecmp($info['COD_PRODUCTO'],$info1['COD_PRODUCTO'])==0)
          {
            $cantidado=$info1['CANTIDAD_PRODUCTO_CENTRO'];
          }

    }
	$valor=$cantidado - $cantidad_enviada;

    mysqli_query(enviaconex(), "UPDATE PRODUCTO_CENTRO SET CANTIDAD_PRODUCTO_CENTRO='$valor' WHERE COD_PRODUCTO='$cod_producto'")or die(mysql_error());

    //VER SI PRODUCTO ESTA EN UN KIT
    $sql3="SELECT * FROM PRODUCTO_KIT WHERE COD_KIT='$cod_producto'";
    $check3 = mysqli_query(enviaconex(),$sql3)or die(mysql_error());
    $ver=false;
    while($info3 = mysqli_fetch_array( $check3 )){
    $ver=true;
    }
    if($ver){
      //RESTA DE LA CANTIDAD DEL KIT
      $sql4="UPDATE PRODUCTO_KIT SET CANTIDAD_KIT=CANTIDAD_KIT-$cantidad_enviada WHERE COD_KIT='$cod_producto' ";
      mysqli_query(enviaconex(),$sql4)or die(mysql_error());
    }



  $cont+=1;
}
header('Location: pPendientes.php');
?>
