<?php include("miItem.php");
session_start();
if(isset($_SESSION['contItem'])){
  $cont=$_SESSION['contItem']+1;
}else{
  $_SESSION['contItem']=0;
  $cont=$_SESSION['contItem'];
}
$id_pedido=$_POST['id_pedido'];
$cod_producto=$_POST['cod_producto'];
$cantidad_pedida=$_POST['cantidad_pedida'];
$cantidad_enviada=$_POST['cantidad_enviada'];
$miItem;
$item= new miItem();
$item->setIdPedido($id_pedido);
$item->setCodProducto($cod_producto);
$item->setCantidadPedida($cantidad_pedida);
$item->setCantidaEnviada($cantidad_enviada);
$miItem[$cont]=$item;
echo "realizadp";
 ?>
