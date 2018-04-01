<?php
class miItem{
  var $id_pedido;
  var $cod_producto;
  var $cantidad_pedida;
  var $cantidad_enviada;

  function setIdPedido($id_pedido){
    $this->id_pedido=$id_pedido;
  }
  function setCodProducto($cod_producto){
    $this->cod_producto=$cod_producto;
  }
  function setCantidadPedida($cantidad_pedida){
    $this->cantidad_pedida=$cantidad_pedida;
  }
  function setCantidadEnviada($cantidad_enviada){
    $this->cantidad_enviada=$cantidad_enviada;
  }
  function getIdPedido(){
    return $this->id_pedido;
  }
  function getCodProducto(){
    return $this->cod_producto;
  }
  function getCantidadPedida(){
    return $this->cantidad_pedida;
  }
  function getCantidadEnviada(){
    return $this->cantidad_enviada;
  }
}

 ?>
