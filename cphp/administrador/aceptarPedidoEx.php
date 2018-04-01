<?php
$idPedido=$_POST['idPedido'];
$sql="Update PEDIDO set ESTADO='RECIBIDO' WHERE ID_PEDIDO='$idPedido' ";
echo $sql;
include('../conexion/conexion.php');
mysqli_query(enviaconex(), $sql)or die(mysql_error());
mysql_close(enviaconex());
 ?>
