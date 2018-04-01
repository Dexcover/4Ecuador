<?php include("mipedido.php");
session_start();
$COD_PRODUCTO=$_GET["cod"];
$cont=$_SESSION['cont'];
$miPedido=$_SESSION['miPedido'];
  for($i=0;$i<$cont;$i++){
    $buscaPedido=$miPedido[$i];
    $buscaCodProducto=$buscaPedido->getCodProducto();
    if($buscaCodProducto==$COD_PRODUCTO){
        unset($miPedido[$i]);
        //reindexa todo mi vector

        $_SESSION['cont']=$cont-1;

    }
  }

  $miPedido = array_values($miPedido);
  $_SESSION['miPedido']=$miPedido;

header('Location: pedido.php');
 ?>
