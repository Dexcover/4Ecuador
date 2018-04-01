<?php
function mostrarexAceptados(){
  $sqlex2="SELECT * FROM PEDIDO WHERE TIPO_PEDIDO='EXTRAORDINARIA' AND ESTADO='RECIBIDO' ORDER BY FECHA ASC";
  $checkex = mysqli_query(enviaconex(), $sqlex2)or die(mysql_error());
  while($extResex = mysqli_fetch_array( $checkex )){
    $sqlex="SELECT * FROM CENTRO WHERE ID_CENTRO='".$extResex['ID_CENTRO']."'";
    $checkex2 = mysqli_query(enviaconex(), $sqlex)or die(mysql_error());
    while($extResex2 = mysqli_fetch_array( $checkex2)){
      $nombre_centro=utf8_encode($extResex2['NOMBRE_CENTRO']);
    }
    echo "<tr>";
    $cont++;
    echo "<td>$cont</td>";
    $idPedido=$info['ID_PEDIDO'];
    echo "<td>".$extResex['ID_PEDIDO']."</td>";
    echo "<td>$nombre_centro</td>";
    echo "<td>".$extResex['FECHA']."</td>";
    echo "<td>".utf8_encode($extResex['DESCRIPCION'])."</td>";
    echo "<td>".$extResex['PRIORIDAD']."</td>";
    ?>
      <?php
    echo "</tr>";
  }
}

function mostrarex($parametro){
$sqlex2="SELECT * FROM PEDIDO WHERE TIPO_PEDIDO='EXTRAORDINARIA' AND ESTADO='$parametro'";
$checkex = mysqli_query(enviaconex(), $sqlex2)or die(mysql_error());
while($extResex = mysqli_fetch_array( $checkex )){
  $sqlex="SELECT * FROM CENTRO WHERE ID_CENTRO='".$extResex['ID_CENTRO']."'";
  $checkex2 = mysqli_query(enviaconex(), $sqlex)or die(mysql_error());
  while($extResex2 = mysqli_fetch_array( $checkex2)){
    $nombre_centro=utf8_encode($extResex2['NOMBRE_CENTRO']);
  }
  echo "<tr>";
  $cont++;
  echo "<td>$cont</td>";
  $idPedido=$info['ID_PEDIDO'];
  echo "<td>".$extResex['ID_PEDIDO']."</td>";
  echo "<td>$nombre_centro</td>";
  echo "<td>".$extResex['FECHA']."</td>";
  echo "<td>".utf8_encode($extResex['DESCRIPCION'])."</td>";
  echo "<td>".$extResex['PRIORIDAD']."</td>";
  ?>
    <td>
      <button  id="bex<?echo "$cont";?>" onclick="realizarEx('<?echo $extResex['ID_PEDIDO'];?>','bex<?echo "$cont";?>'); return false"  class="btn btn-info" >Enviar Recibimiento</button>
        </td>


    <?php
  echo "</tr>";
}
}

 ?>
