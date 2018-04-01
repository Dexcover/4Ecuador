<?php session_start();
include("../conexion/conexion.php");
$producto=$_POST['producto'];

$desProducto=$_POST['desProducto'];

//$pesoCantidad=$_POST['pesoCantidad'];
$cantidad=$_POST['cantidad'];
$categoria=$_POST['categoria'];
$centro=$_SESSION["ID_CENTRO"];
$sql="INSERT INTO `PEDIDO`(`ID_CENTRO`, `FECHA`, `ESTADO`, `PRIORIDAD`, `DESCRIPCION`, `LATITUD`, `LONGITUD`,`TIPO_PEDIDO`) VALUES ('$centro',NOW(),'PENDIENTE','NORMAL','Producto: $producto, Descripcion: $desProducto, Cantidad: $cantidad, Categoria: $categoria',null,null,'EXTRAORDINARIA') ";
mysqli_query(enviaconex(), $sql)or die(mysql_error());
header("Location: producto.php");
 ?>
