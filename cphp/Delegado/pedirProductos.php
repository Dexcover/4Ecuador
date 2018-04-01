<?php include("mipedido.php");
session_start();

$producto=$_POST['producto'];
$cantidad=$_POST['cantidad'];

$cod_producto=$_POST['cod_producto'];
$descripcion=$_POST['descripcion'];
$centro=$_POST['centro'];
$cod_centro=$_POST['id_centro'];

/*DECLARANDO MI ARREGLO DEL PEDIDO */
if(empty($cantidad) || $cantidad<=0) {
  echo "<div class='alert alert-danger' role='alert'><strong>Error! </strong>  No se ha registrado el Producto porque no ingreso una  cantidad valida <div>";
}else{
if(isset($_SESSION['cont']) && isset($_SESSION['miPedido'])){
  $cont=$_SESSION['cont'];
  $miPedido=$_SESSION['miPedido'];
  $val=false;

  for($i=0;$i<$cont;$i++){

    $buscaPedido=$miPedido[$i];
     $buscaProducto=$buscaPedido->getNombreProducto();
    $buscaCentro=$buscaPedido->getIdCentro();
    if(strcasecmp($buscaProducto,$producto)==0 && $buscaCentro==$cod_centro){
      $cantidadOld=$buscaPedido->getCantidad();
      $cantidadNew=$cantidadOld+$cantidad;
      $buscaPedido->setCantidad($cantidadNew);
      $val=true;
      echo "<div class='alert alert-warning' role='alert'><strong>Cantidad Solicitada! </strong> $cantidadNew </div>";
    }


}


if(!$val){

    $pedido=new MiPedido();
    $pedido->setCodProducto($cod_producto);
    $pedido->setNombreProducto($producto);
    $pedido->setCantidad($cantidad);
    $pedido->setCentro($centro);
    $pedido->setIdCentro($cod_centro);
    $pedido->setDescripcion($descripcion);
    $miPedido[$cont]=$pedido;
    $cont+=1;
    $_SESSION['cont']=$cont;
      $_SESSION['miPedido']=$miPedido;
    echo "<div class='alert alert-success' role='alert'> <strong>Genial! </strong> Producto añadido</div>";
}

}else{
  $_SESSION['cont']=0;
  $cont=$_SESSION['cont'];
  $miPedido;
  $pedido  = new MiPedido();
  $pedido->setCodProducto($cod_producto);
  $pedido->setNombreProducto($producto);
  $pedido->setCantidad($cantidad);
  $pedido->setCentro($centro);
  $pedido->setIdCentro($cod_centro);
  $pedido->setDescripcion($descripcion);
  $miPedido[$cont]=$pedido;
  $_SESSION['miPedido']=$miPedido;
  $_SESSION['cont']=1;
  echo "<div class='alert alert-success' role='alert'><strong>Genial! </strong> Producto añadido</div>";
}
}


//header("Location: /4ecuador/user.php");


 ?>
