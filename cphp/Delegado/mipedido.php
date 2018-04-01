<?php
class MiPedido{
var $cod_producto;
var $nombre_producto;
var $id_centro;
var $centro;
var $cantidad;
var $descripcion;

/*PRIMERO LOS SET */
function setCodProducto($cod_producto){
  $this->cod_producto=$cod_producto;
}
function setNombreProducto($nombre_producto){
  $this->nombre_producto=$nombre_producto;
}
function setIdCentro($id_centro){
  $this->id_centro=$id_centro;
}
function setCentro($centro){
  $this->centro=$centro;
}
function setCantidad($cantidad){
  $this->cantidad=$cantidad;
}
function setDescripcion($descripcion){
  $this->descripcion=$descripcion;
}


/*SEGUNDO LOPS GET*/
  function getCodProducto(){
    return $this->cod_producto;
  }
  function getNombreProducto(){
    return $this->nombre_producto;
  }
  function getIdCentro(){
    return $this->id_centro;
  }
  function getCentro(){
    return $this->centro;
  }
  function getCantidad(){
    return $this->cantidad;
  }
  function getDescripcion(){
    return $this->descripcion;
  }
}
?>
