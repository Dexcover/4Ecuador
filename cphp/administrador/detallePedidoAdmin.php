<?php include("../conexion/conexion.php");
$idPedido=$_POST['idPedido'];
$sql="SELECT PRODUCTO.COD_PRODUCTO,NOMBRE_PRODUCTO, CANTIDAD_PEDIDO, CANTIDAD_ENVIADA FROM PEDIDO, PRODUCTO_PEDIDO, PRODUCTO WHERE PEDIDO.ID_PEDIDO='$idPedido' AND PEDIDO.ID_PEDIDO=PRODUCTO_PEDIDO.ID_PEDIDO AND PRODUCTO.COD_PRODUCTO=PRODUCTO_PEDIDO.COD_PRODUCTO";
$data=mysqli_query(enviaconex(),$sql)or die(mysql_error());
$draw="<form name='pedido$idPedido' method='post' action='realizarPedido.php'>";
$draw.="<table class='table table-striped table-bordered table-hover'>";
$draw.="<thead><tr>";
$draw.="<th><b>Producto</b></th>";
$draw.="<th><b><font color='#690600'>Cant en Bodega</font></b></th>";
$draw.="<th style='text-align: center;'><b>Cantidad Pedida</b></th>";
$draw.="<th style='text-align: center;'><b>Cantidad Enviada</b></th>";
$draw.="</tr></thead>";
$draw.="<tbody>";
$cont=0;
while ($info = mysqli_fetch_array($data)) {
//CODIGO PARA BUSCAR LA CANTIDAD DEL PRODUCTO QUE EXISTE EN BODEGA.
$sqlcantidad="SELECT CANTIDAD_PRODUCTO_CENTRO FROM CENTRO, PRODUCTO, PRODUCTO_CENTRO WHERE CENTRO.ID_CENTRO=PRODUCTO_CENTRO.ID_CENTRO AND PRODUCTO.COD_PRODUCTO=PRODUCTO_CENTRO.COD_PRODUCTO AND PRODUCTO_CENTRO.COD_PRODUCTO='".$info['COD_PRODUCTO']."'"; //Sql para buscar la cantidad del producto
$data2=mysqli_query(enviaconex(),$sqlcantidad)or die(mysql_error());
$draw.="<tr>";
$draw.="<td>".utf8_encode($info['NOMBRE_PRODUCTO'])."</td>";
while ($info2 = mysqli_fetch_array($data2)) {
$draw.="<td style='text-align: center;' >".utf8_encode($info2['CANTIDAD_PRODUCTO_CENTRO'])."</td>";
}
$draw.="<input type='hidden' name='idPedido' value='$idPedido' />";
$draw.="<input type='hidden' name='cod_producto$cont' value='".$info['COD_PRODUCTO']."' />";
$draw.="<td><input style='text-align: center;' name='cantidad_pedida$cont' type='text' value='".$info['CANTIDAD_PEDIDO']."' /></td>";
$draw.="<td><input style='text-align: center;' name='cantidad_enviada$cont' type='text' value='".$info['CANTIDAD_ENVIADA']."' /></td>";
$draw.="</tr>";
$cont+=1;
}
$draw.="</tbody>";
$draw.="</table>";
$draw.="<input type='text' name='ob' size='500' placeholder='Escriba Aqui si tiene alguna observación referente al Pedido' />";
$draw.=	"<a href='javascript: document.pedido$idPedido.submit(); ' class='btn btn-success' role='button' >Enviar Pedido</a>";
$draw.="</form>";
echo $draw;
 ?>
