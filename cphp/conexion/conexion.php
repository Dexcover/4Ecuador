<?php
  function enviaconex(){
  $servidor="mysql.4ecuador.infodesarrollo.ec";
    $usuario="upsecuador";
    $nombre_base="4ecuador";
    $clave="Ups.2016";
  $conect = mysqli_connect($servidor,$usuario,$clave,$nombre_base);
  //$conect=mysql_connect("sql100.260mb.net","n260m_14121914","4ecuador123") or die("Nose conecto");
  //mysql_select_db("260m_14121914_4ecuador",$conect) or die("error eb ka base");

  return $conect;
}

 ?>
