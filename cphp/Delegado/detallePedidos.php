<?php include("../conexion/conexion.php");
$idPedido=$_POST['idPedido'];
$sql="SELECT NOMBRE_PRODUCTO, CANTIDAD_PEDIDO, CANTIDAD_ENVIADA FROM PEDIDO, PRODUCTO_PEDIDO, PRODUCTO WHERE PEDIDO.ID_PEDIDO='$idPedido' AND PEDIDO.ID_PEDIDO=PRODUCTO_PEDIDO.ID_PEDIDO AND PRODUCTO.COD_PRODUCTO=PRODUCTO_PEDIDO.COD_PRODUCTO";
$data=mysqli_query(enviaconex(),$sql)or die(mysql_error());
$draw.="<table class=\"table table-striped table-condensed table-hover\" align=\"center\" style=\"text-align: center;\"><thead>";
$draw.="<tr style=\"color: skyblue\">";
$draw.="<th><b>Producto</b></th>";
$draw.="<th><b>Cantidad Pedida</b></th>";
$draw.="<th><b>Cantidad Enviada</b></th></tr></thead><tbody>";

while ($info = mysqli_fetch_array($data)) {
$draw.="<tr>";
$draw.="<td>".utf8_encode($info['NOMBRE_PRODUCTO'])."</td>";
$draw.="<td>".$info['CANTIDAD_PEDIDO']." </td>";
$draw.="<td>".$info['CANTIDAD_ENVIADA']."</td>";
$draw.="</tr>";
}

$draw.="	</tbody></table>";
echo $draw;
 ?>
